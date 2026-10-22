# Keep the JavaScript bridge used by the website inside the app.
-keepclassmembers class com.alifvisa.app.MainActivity$AppBridge {
    @android.webkit.JavascriptInterface <methods>;
}
-keepattributes JavascriptInterface
