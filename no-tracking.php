/* ===== Alif no tracking (5 Nov 2026) ===== */
/* The cookie banner is switched off, so no tracking may run: strip Google Tag Manager, Google Analytics and Meta Pixel from every public page. Essential cookies (sign-in, saved answers, Stripe) still work. */
add_action('template_redirect', function () {
    if (is_admin() || wp_doing_ajax() || (defined('REST_REQUEST') && REST_REQUEST) || is_feed()) {
        return;
    }
    ob_start(function ($html) {
        if (!is_string($html) || stripos($html, '<html') === false) {
            return $html;
        }
        $html = preg_replace_callback('#<script\b[^>]*>.*?</script>#is', function ($m) {
            return preg_match('#googletagmanager\.com|google-analytics\.com|\bgtag\s*\(|GTM-[A-Z0-9]{4,}|connect\.facebook\.net|\bfbq\s*\(#i', $m[0]) ? '' : $m[0];
        }, $html);
        $html = preg_replace('#<noscript>\s*<(?:iframe|img)[^>]+(?:googletagmanager\.com|facebook\.com/tr)[^>]*>(?:\s*</iframe>)?\s*</noscript>#i', '', $html);
        $html = preg_replace('#<link[^>]+(?:googletagmanager\.com|connect\.facebook\.net)[^>]*>#i', '', $html);
        return $html;
    });
}, 0);
/* The theme's own "Cookies on Alif Visa" bar stays hidden too. */
add_action('wp_head', function () {
    echo '<style id="alif-no-cookie-bar">.alif-cookie-banner,#alif-cookie-banner{display:none!important}</style>';
}, 1);
/* ===== end Alif no tracking ===== */
