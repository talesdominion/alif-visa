/* ===== Alif SEO meta fixes ===== */
/** Cleans templated titles: drops "Best Guide to"/"Best Complete Guide" and the brand when a title is too long for Google. */
function alif_seo_clean_title($title) {
    if (!is_string($title) || $title === '') {
        return $title;
    }
    $t = preg_replace('/:\s*Best Complete Guide\b/u', '', $title);
    $t = preg_replace('/:\s*Best Guide to\s+/u', ': ', $t);
    $t = preg_replace('/\s+/u', ' ', trim($t));
    if (mb_strlen($t) > 62) {
        $t = preg_replace('/\s+[|\-–]\s+Alif Visa$/u', '', $t);
    }
    return $t;
}
add_filter('rank_math/frontend/title', 'alif_seo_clean_title', 20);

/** First real paragraph of the post, used when the stored description is empty or is a table of contents. */
function alif_seo_fallback_description($post_id) {
    $html = (string) get_post_field('post_content', $post_id);
    if ($html === '') {
        return '';
    }
    if (preg_match_all('#<p[^>]*>(.*?)</p>#is', $html, $m)) {
        foreach ($m[1] as $p) {
            $txt = trim(preg_replace('/\s+/u', ' ', html_entity_decode(wp_strip_all_tags($p), ENT_QUOTES, 'UTF-8')));
            if (mb_strlen($txt) < 70 || stripos($txt, 'In this article') === 0) {
                continue;
            }
            if (mb_strlen($txt) > 155) {
                $cut = mb_substr($txt, 0, 155);
                $sp = mb_strrpos($cut, ' ');
                $txt = rtrim(mb_substr($cut, 0, $sp ?: 152), " ,;:-–") . '…';
            }
            return $txt;
        }
    }
    return '';
}
function alif_seo_fix_description($desc) {
    if (is_singular() && (!is_string($desc) || trim($desc) === '' || stripos(ltrim($desc), 'In this article') === 0)) {
        $alt = alif_seo_fallback_description(get_queried_object_id());
        if ($alt !== '') {
            return $alt;
        }
    }
    return $desc;
}
add_filter('rank_math/frontend/description', 'alif_seo_fix_description', 20);
add_filter('rank_math/opengraph/facebook/og_description', 'alif_seo_fix_description', 20);
add_filter('rank_math/opengraph/twitter/twitter_description', 'alif_seo_fix_description', 20);
add_filter('rank_math/opengraph/facebook/og_title', 'alif_seo_clean_title', 20);
add_filter('rank_math/opengraph/twitter/twitter_title', 'alif_seo_clean_title', 20);
/* ===== end Alif SEO meta fixes ===== */
