package com.alifvisa.app;

import android.annotation.SuppressLint;
import android.app.DownloadManager;
import android.content.ActivityNotFoundException;
import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.ConnectivityManager;
import android.net.NetworkCapabilities;
import android.net.Uri;
import android.os.Build;
import android.os.Bundle;
import android.os.Environment;
import android.os.SystemClock;
import android.provider.MediaStore;
import android.view.View;
import android.webkit.CookieManager;
import android.webkit.URLUtil;
import android.webkit.ValueCallback;
import android.webkit.WebChromeClient;
import android.webkit.WebResourceError;
import android.webkit.WebResourceRequest;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;

import androidx.activity.OnBackPressedCallback;
import androidx.activity.result.ActivityResultLauncher;
import androidx.activity.result.contract.ActivityResultContracts;
import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.browser.customtabs.CustomTabColorSchemeParams;
import androidx.browser.customtabs.CustomTabsIntent;
import androidx.core.content.FileProvider;
import androidx.core.graphics.Insets;
import androidx.core.splashscreen.SplashScreen;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowCompat;
import androidx.core.view.WindowInsetsCompat;
import androidx.core.view.WindowInsetsControllerCompat;
import androidx.swiperefreshlayout.widget.SwipeRefreshLayout;
import androidx.webkit.WebSettingsCompat;
import androidx.webkit.WebViewCompat;
import androidx.webkit.WebViewFeature;

import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.google.android.material.progressindicator.LinearProgressIndicator;

import java.io.File;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.Locale;

public class MainActivity extends AppCompatActivity {

    static final String BASE = "https://alifvisa.com";
    static final String HOME = BASE + "/";
    static final String APPLY = BASE + "/visa/search/";
    static final String TRACK = BASE + "/track-application/";
    static final String HELP = BASE + "/contact/";
    static final String ACCOUNT = BASE + "/dashboard/";

    /** Hosts that stay inside the app (the site itself and the Stripe payment pages). */
    static boolean isInternalHost(String host) {
        if (host == null) return false;
        host = host.toLowerCase(Locale.ROOT);
        return host.equals("alifvisa.com") || host.equals("www.alifvisa.com")
                || host.equals("stripe.com") || host.endsWith(".stripe.com")
                || host.equals("stripe.network") || host.endsWith(".stripe.network");
    }

    /** CSS added to every page inside the app: hides "get the app" promos and the desktop top strip. */
    static final String APP_CSS =
            "html.in-app .alif-app-banner,html.in-app body .alif-app-banner,html.in-app [data-alif-app-banner],"
            + "html.in-app .avp-cta__play,html.in-app .avft__app,html.in-app .avft__play,"
            + "html.in-app .alif-utility-bar,html.in-app #wpadminbar{display:none!important}"
            + "html{margin-top:0!important}"
            + "*{-webkit-tap-highlight-color:transparent}";

    static final String APP_JS =
            "(function(){try{document.documentElement.classList.add('in-app');"
            + "try{sessionStorage.setItem('alif-app-banner-dismissed-v2','1');}catch(e){}"
            + "var id='alif-app-css';function add(){if(document.getElementById(id))return;"
            + "var s=document.createElement('style');s.id=id;s.textContent=" + jsString(APP_CSS) + ";"
            + "(document.head||document.documentElement).appendChild(s);}add();"
            + "document.addEventListener('DOMContentLoaded',add);}catch(e){}})();";

    private WebView web;
    private SwipeRefreshLayout refresh;
    private LinearProgressIndicator progress;
    private View offline;
    private BottomNavigationView nav;
    private boolean ready = false;
    private boolean syncingNav = false;
    private long lastBack = 0;
    private String failedUrl = null;

    private ValueCallback<Uri[]> fileCallback;
    private Uri cameraUri;
    private ActivityResultLauncher<Intent> filePicker;

    @SuppressLint("SetJavaScriptEnabled")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        SplashScreen splash = SplashScreen.installSplashScreen(this);
        super.onCreate(savedInstanceState);
        final long started = SystemClock.uptimeMillis();
        splash.setKeepOnScreenCondition(() -> !ready && SystemClock.uptimeMillis() - started < 3500);

        WindowCompat.setDecorFitsSystemWindows(getWindow(), false);
        setContentView(R.layout.activity_main);
        WindowInsetsControllerCompat bars = WindowCompat.getInsetsController(getWindow(), getWindow().getDecorView());
        bars.setAppearanceLightStatusBars(true);
        bars.setAppearanceLightNavigationBars(true);

        web = findViewById(R.id.web);
        refresh = findViewById(R.id.refresh);
        progress = findViewById(R.id.progress);
        offline = findViewById(R.id.offline);
        nav = findViewById(R.id.nav);
        View root = findViewById(R.id.root);

        // Edge-to-edge: pad for the status bar, and lift content above the keyboard.
        ViewCompat.setOnApplyWindowInsetsListener(root, (v, insets) -> {
            Insets sys = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            Insets ime = insets.getInsets(WindowInsetsCompat.Type.ime());
            boolean keyboard = insets.isVisible(WindowInsetsCompat.Type.ime());
            v.setPadding(sys.left, sys.top, sys.right, keyboard ? ime.bottom : 0);
            nav.setVisibility(keyboard ? View.GONE : View.VISIBLE);
            return insets;
        });

        refresh.setColorSchemeResources(R.color.brand_green_dark, R.color.brand_green);
        refresh.setOnChildScrollUpCallback((parent, child) -> web.canScrollVertically(-1) || web.getScrollY() > 0);
        refresh.setOnRefreshListener(() -> {
            if (offline.getVisibility() == View.VISIBLE) retry();
            else web.reload();
        });
        findViewById(R.id.retry).setOnClickListener(v -> retry());

        setupWebView();
        watchNetwork();
        setupFilePicker();
        setupNavigation();
        setupBack();

        if (savedInstanceState != null && web.restoreState(savedInstanceState) != null) {
            ready = true;
        } else {
            String deep = deepLink(getIntent());
            web.loadUrl(deep != null ? deep : HOME);
        }
    }

    @SuppressLint("SetJavaScriptEnabled")
    private void setupWebView() {
        WebSettings s = web.getSettings();
        s.setJavaScriptEnabled(true);
        s.setDomStorageEnabled(true);
        s.setDatabaseEnabled(true);
        s.setLoadWithOverviewMode(true);
        s.setUseWideViewPort(true);
        s.setSupportZoom(false);
        s.setBuiltInZoomControls(false);
        s.setDisplayZoomControls(false);
        s.setTextZoom(100);
        s.setMediaPlaybackRequiresUserGesture(true);
        s.setAllowFileAccess(false);
        s.setAllowContentAccess(true);
        s.setMixedContentMode(WebSettings.MIXED_CONTENT_NEVER_ALLOW);
        s.setSupportMultipleWindows(false);
        s.setJavaScriptCanOpenWindowsAutomatically(true);
        s.setUserAgentString(s.getUserAgentString() + " AlifVisaApp/" + BuildConfig.VERSION_NAME + " (Android)");

        if (WebViewFeature.isFeatureSupported(WebViewFeature.ALGORITHMIC_DARKENING)) {
            WebSettingsCompat.setAlgorithmicDarkeningAllowed(s, false);
        }

        CookieManager cookies = CookieManager.getInstance();
        cookies.setAcceptCookie(true);
        cookies.setAcceptThirdPartyCookies(web, true);

        if (WebViewFeature.isFeatureSupported(WebViewFeature.DOCUMENT_START_SCRIPT)) {
            WebViewCompat.addDocumentStartJavaScript(web, APP_JS,
                    Collections.singleton("https://alifvisa.com"));
            WebViewCompat.addDocumentStartJavaScript(web, APP_JS,
                    Collections.singleton("https://www.alifvisa.com"));
        }

        web.setWebViewClient(new WebViewClient() {
            @Override
            public boolean shouldOverrideUrlLoading(WebView view, WebResourceRequest request) {
                return handleUrl(request.getUrl(), request.isForMainFrame());
            }

            @Override
            public void onPageStarted(WebView view, String url, Bitmap favicon) {
                progress.setVisibility(View.VISIBLE);
                failedUrl = null;
            }

            @Override
            public void onPageCommitVisible(WebView view, String url) {
                ready = true;
            }

            @Override
            public void onPageFinished(WebView view, String url) {
                ready = true;
                progress.setVisibility(View.GONE);
                refresh.setRefreshing(false);
                Uri u = Uri.parse(url);
                if (isOwnSite(u)) view.evaluateJavascript(APP_JS, null);
                if (failedUrl == null) {
                    offline.setVisibility(View.GONE);
                    autoRetries = 0;
                }
                CookieManager.getInstance().flush();
            }

            @Override
            public void onReceivedError(WebView view, WebResourceRequest request, WebResourceError error) {
                if (request.isForMainFrame()) {
                    failedUrl = request.getUrl().toString();
                    showOffline();
                }
            }

            @Override
            public void doUpdateVisitedHistory(WebView view, String url, boolean isReload) {
                syncNav(url);
            }

            @androidx.annotation.RequiresApi(26)
            @Override
            public boolean onRenderProcessGone(WebView view, android.webkit.RenderProcessGoneDetail detail) {
                // The page's renderer was stopped by the system (usually low memory). Rebuild the
                // WebView instead of letting the whole app close.
                String last = view.getUrl();
                recreateWebView(last != null ? last : HOME);
                return true;
            }
        });

        web.setWebChromeClient(new WebChromeClient() {
            @Override
            public void onProgressChanged(WebView view, int newProgress) {
                progress.setProgressCompat(newProgress, true);
                if (newProgress >= 100) progress.setVisibility(View.GONE);
            }

            @Override
            public boolean onShowFileChooser(WebView view, ValueCallback<Uri[]> callback, FileChooserParams params) {
                if (fileCallback != null) fileCallback.onReceiveValue(null);
                fileCallback = callback;
                openFilePicker(params);
                return true;
            }
        });

        web.setDownloadListener((url, userAgent, contentDisposition, mimeType, contentLength) -> {
            Uri uri = Uri.parse(url);
            if (Build.VERSION.SDK_INT < Build.VERSION_CODES.Q || !"https".equals(uri.getScheme())) {
                openExternal(uri);
                return;
            }
            try {
                String name = URLUtil.guessFileName(url, contentDisposition, mimeType);
                DownloadManager.Request r = new DownloadManager.Request(uri);
                r.setMimeType(mimeType);
                r.addRequestHeader("Cookie", CookieManager.getInstance().getCookie(url));
                r.addRequestHeader("User-Agent", userAgent);
                r.setTitle(name);
                r.setNotificationVisibility(DownloadManager.Request.VISIBILITY_VISIBLE_NOTIFY_COMPLETED);
                r.setDestinationInExternalPublicDir(Environment.DIRECTORY_DOWNLOADS, name);
                DownloadManager dm = (DownloadManager) getSystemService(Context.DOWNLOAD_SERVICE);
                dm.enqueue(r);
                Toast.makeText(this, R.string.download_started, Toast.LENGTH_SHORT).show();
            } catch (Exception e) {
                openExternal(uri);
            }
        });
    }

    private void recreateWebView(String url) {
        android.view.ViewGroup parent = (android.view.ViewGroup) web.getParent();
        int index = parent.indexOfChild(web);
        android.view.ViewGroup.LayoutParams lp = web.getLayoutParams();
        parent.removeView(web);
        web.destroy();
        web = new WebView(this);
        web.setId(R.id.web);
        web.setBackgroundColor(0xFFFFFFFF);
        parent.addView(web, index, lp);
        setupWebView();
        web.loadUrl(url);
    }

    static boolean isOwnSite(Uri u) {
        String h = u.getHost();
        return h != null && (h.equalsIgnoreCase("alifvisa.com") || h.equalsIgnoreCase("www.alifvisa.com"));
    }

    /** Returns true when the app handled the link itself (so the WebView should not load it). */
    private boolean handleUrl(Uri uri, boolean mainFrame) {
        String scheme = uri.getScheme() == null ? "" : uri.getScheme().toLowerCase(Locale.ROOT);
        String host = uri.getHost() == null ? "" : uri.getHost().toLowerCase(Locale.ROOT);

        if (scheme.equals("http") || scheme.equals("https")) {
            if (host.equals("wa.me") || host.equals("api.whatsapp.com") || host.equals("chat.whatsapp.com")
                    || host.equals("maps.google.com") || host.equals("maps.app.goo.gl")
                    || (host.endsWith("google.com") && uri.getPath() != null && uri.getPath().startsWith("/maps"))
                    || host.equals("play.google.com")) {
                openExternal(uri);
                return true;
            }
            if (isInternalHost(host)) return false;
            if (!mainFrame) return false;
            // During payment (Stripe, card 3-D Secure) keep every step inside the app.
            String current = web.getUrl();
            if (current != null && isInternalHost(Uri.parse(current).getHost()) && !isOwnSite(Uri.parse(current))) {
                return false;
            }
            openCustomTab(uri);
            return true;
        }
        if (scheme.equals("intent")) {
            try {
                Intent i = Intent.parseUri(uri.toString(), Intent.URI_INTENT_SCHEME);
                i.addCategory(Intent.CATEGORY_BROWSABLE);
                i.setComponent(null);
                i.setSelector(null);
                startActivity(i);
            } catch (Exception e) {
                try {
                    Intent i = Intent.parseUri(uri.toString(), Intent.URI_INTENT_SCHEME);
                    String fallback = i.getStringExtra("browser_fallback_url");
                    if (fallback != null) openCustomTab(Uri.parse(fallback));
                } catch (Exception ignored) {
                }
            }
            return true;
        }
        // tel:, mailto:, sms:, whatsapp:, geo: and anything else goes to the matching app.
        openExternal(uri);
        return true;
    }

    private void openExternal(Uri uri) {
        try {
            Intent i = new Intent(Intent.ACTION_VIEW, uri);
            if ("mailto".equalsIgnoreCase(uri.getScheme())) i = new Intent(Intent.ACTION_SENDTO, uri);
            if ("tel".equalsIgnoreCase(uri.getScheme())) i = new Intent(Intent.ACTION_DIAL, uri);
            i.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
            startActivity(i);
        } catch (ActivityNotFoundException e) {
            Toast.makeText(this, R.string.no_app, Toast.LENGTH_SHORT).show();
        }
    }

    private void openCustomTab(Uri uri) {
        try {
            CustomTabColorSchemeParams colors = new CustomTabColorSchemeParams.Builder()
                    .setToolbarColor(0xFFFFFFFF).build();
            new CustomTabsIntent.Builder().setDefaultColorSchemeParams(colors).setShowTitle(true)
                    .build().launchUrl(this, uri);
        } catch (Exception e) {
            openExternal(uri);
        }
    }

    private void setupFilePicker() {
        filePicker = registerForActivityResult(new ActivityResultContracts.StartActivityForResult(), result -> {
            if (fileCallback == null) return;
            Uri[] picked = null;
            Intent data = result.getData();
            if (result.getResultCode() == RESULT_OK) {
                if (data != null && data.getClipData() != null) {
                    int n = data.getClipData().getItemCount();
                    picked = new Uri[n];
                    for (int i = 0; i < n; i++) picked[i] = data.getClipData().getItemAt(i).getUri();
                } else if (data != null && data.getData() != null) {
                    picked = new Uri[]{data.getData()};
                } else if (cameraUri != null) {
                    picked = new Uri[]{cameraUri};
                }
            }
            fileCallback.onReceiveValue(picked);
            fileCallback = null;
            cameraUri = null;
        });
    }

    private void openFilePicker(WebChromeClient.FileChooserParams params) {
        Intent content = new Intent(Intent.ACTION_GET_CONTENT);
        content.addCategory(Intent.CATEGORY_OPENABLE);
        String[] accept = params.getAcceptTypes();
        List<String> types = new ArrayList<>();
        if (accept != null) {
            for (String a : accept) {
                if (a == null) continue;
                for (String t : a.split(",")) {
                    t = t.trim();
                    if (t.isEmpty()) continue;
                    if (t.startsWith(".")) {
                        String ext = t.substring(1).toLowerCase(Locale.ROOT);
                        String mime = android.webkit.MimeTypeMap.getSingleton().getMimeTypeFromExtension(ext);
                        if (mime != null) types.add(mime);
                    } else {
                        types.add(t);
                    }
                }
            }
        }
        if (types.isEmpty()) {
            content.setType("*/*");
        } else if (types.size() == 1) {
            content.setType(types.get(0));
        } else {
            content.setType("*/*");
            content.putExtra(Intent.EXTRA_MIME_TYPES, types.toArray(new String[0]));
        }
        content.putExtra(Intent.EXTRA_ALLOW_MULTIPLE,
                params.getMode() == WebChromeClient.FileChooserParams.MODE_OPEN_MULTIPLE);

        boolean wantsImages = types.isEmpty();
        for (String t : types) if (t.startsWith("image")) wantsImages = true;

        List<Intent> extras = new ArrayList<>();
        if (wantsImages) {
            try {
                File dir = new File(getCacheDir(), "captures");
                //noinspection ResultOfMethodCallIgnored
                dir.mkdirs();
                File photo = File.createTempFile("passport_", ".jpg", dir);
                cameraUri = FileProvider.getUriForFile(this, getPackageName() + ".files", photo);
                Intent camera = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
                camera.putExtra(MediaStore.EXTRA_OUTPUT, cameraUri);
                camera.addFlags(Intent.FLAG_GRANT_WRITE_URI_PERMISSION | Intent.FLAG_GRANT_READ_URI_PERMISSION);
                if (camera.resolveActivity(getPackageManager()) != null) extras.add(camera);
            } catch (Exception ignored) {
                cameraUri = null;
            }
        }

        Intent chooser = Intent.createChooser(content, getString(R.string.choose_file));
        if (!extras.isEmpty()) chooser.putExtra(Intent.EXTRA_INITIAL_INTENTS, extras.toArray(new Intent[0]));
        try {
            filePicker.launch(chooser);
        } catch (ActivityNotFoundException e) {
            if (fileCallback != null) fileCallback.onReceiveValue(null);
            fileCallback = null;
        }
    }

    private void setupNavigation() {
        nav.setOnItemSelectedListener(item -> {
            if (syncingNav) return true;
            String target = urlFor(item.getItemId());
            if (target != null) web.loadUrl(target);
            return true;
        });
        nav.setOnItemReselectedListener(item -> {
            String target = urlFor(item.getItemId());
            if (target != null) web.loadUrl(target);
        });
    }

    private static String urlFor(int id) {
        if (id == R.id.nav_home) return HOME;
        if (id == R.id.nav_apply) return APPLY;
        if (id == R.id.nav_track) return TRACK;
        if (id == R.id.nav_help) return HELP;
        if (id == R.id.nav_account) return ACCOUNT;
        return null;
    }

    /** Highlights the tab that matches the page the visitor is on, without reloading it. */
    private void syncNav(String url) {
        if (url == null) return;
        Uri u = Uri.parse(url);
        if (!isOwnSite(u)) return;
        String p = u.getPath() == null ? "/" : u.getPath();
        int id;
        if (p.equals("/") || p.isEmpty()) id = R.id.nav_home;
        else if (p.startsWith("/visa/search") || p.startsWith("/apply") || p.startsWith("/pay")) id = R.id.nav_apply;
        else if (p.startsWith("/track-application")) id = R.id.nav_track;
        else if (p.startsWith("/contact") || p.startsWith("/faq")) id = R.id.nav_help;
        else if (p.startsWith("/dashboard") || p.startsWith("/login") || p.startsWith("/signup")
                || p.startsWith("/my-account") || p.startsWith("/account")) id = R.id.nav_account;
        else id = 0;
        syncingNav = true;
        if (id == 0) {
            nav.getMenu().setGroupCheckable(0, true, false);
            for (int i = 0; i < nav.getMenu().size(); i++) nav.getMenu().getItem(i).setChecked(false);
            nav.getMenu().setGroupCheckable(0, true, true);
        } else if (nav.getSelectedItemId() != id || !nav.getMenu().findItem(id).isChecked()) {
            nav.getMenu().findItem(id).setChecked(true);
        }
        syncingNav = false;
    }

    private void setupBack() {
        getOnBackPressedDispatcher().addCallback(this, new OnBackPressedCallback(true) {
            @Override
            public void handleOnBackPressed() {
                if (offline.getVisibility() == View.VISIBLE && web.canGoBack()) {
                    offline.setVisibility(View.GONE);
                    web.goBack();
                    return;
                }
                if (web.canGoBack()) {
                    web.goBack();
                    return;
                }
                String current = web.getUrl();
                if (current != null && !current.equals(HOME) && !current.equals(BASE)) {
                    web.loadUrl(HOME);
                    return;
                }
                long now = SystemClock.uptimeMillis();
                if (now - lastBack < 2000) {
                    finish();
                } else {
                    lastBack = now;
                    Toast.makeText(MainActivity.this, R.string.exit_hint, Toast.LENGTH_SHORT).show();
                }
            }
        });
    }

    private int autoRetries = 0;

    /** Reloads the page by itself as soon as the phone is back online. */
    private void watchNetwork() {
        ConnectivityManager cm = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
        if (cm == null) return;
        try {
            cm.registerDefaultNetworkCallback(new ConnectivityManager.NetworkCallback() {
                @Override
                public void onAvailable(@NonNull android.net.Network network) {
                    runOnUiThread(() -> {
                        if (offline.getVisibility() == View.VISIBLE) web.postDelayed(MainActivity.this::retry, 800);
                    });
                }
            });
        } catch (Exception ignored) {
        }
    }

    private void showOffline() {
        if (autoRetries < 2 && isOnline()) {
            // A brief network hiccup: try again quietly before showing the offline screen.
            autoRetries++;
            web.postDelayed(this::retry, 1500);
            return;
        }
        ready = true;
        progress.setVisibility(View.GONE);
        refresh.setRefreshing(false);
        offline.setVisibility(View.VISIBLE);
    }

    private void retry() {
        if (!isOnline()) {
            refresh.setRefreshing(false);
            showOffline();
            return;
        }
        offline.setVisibility(View.GONE);
        String target = failedUrl != null ? failedUrl : (web.getUrl() != null ? web.getUrl() : HOME);
        failedUrl = null;
        web.loadUrl(target);
    }

    private boolean isOnline() {
        ConnectivityManager cm = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
        if (cm == null) return true;
        NetworkCapabilities caps = cm.getNetworkCapabilities(cm.getActiveNetwork());
        return caps != null && caps.hasCapability(NetworkCapabilities.NET_CAPABILITY_INTERNET);
    }

    private static String deepLink(Intent intent) {
        if (intent == null || intent.getData() == null) return null;
        Uri u = intent.getData();
        if (("https".equals(u.getScheme()) || "http".equals(u.getScheme())) && isOwnSite(u)) {
            return u.buildUpon().scheme("https").build().toString();
        }
        return null;
    }

    @Override
    protected void onNewIntent(@NonNull Intent intent) {
        super.onNewIntent(intent);
        String deep = deepLink(intent);
        if (deep != null) web.loadUrl(deep);
    }

    @Override
    protected void onSaveInstanceState(@NonNull Bundle outState) {
        super.onSaveInstanceState(outState);
        web.saveState(outState);
    }

    @Override
    protected void onPause() {
        super.onPause();
        CookieManager.getInstance().flush();
        web.onPause();
    }

    @Override
    protected void onResume() {
        super.onResume();
        web.onResume();
    }

    @Override
    protected void onDestroy() {
        if (web != null) {
            web.stopLoading();
            web.destroy();
        }
        super.onDestroy();
    }

    static String jsString(String s) {
        return "'" + s.replace("\\", "\\\\").replace("'", "\\'").replace("\n", "\\n") + "'";
    }
}
