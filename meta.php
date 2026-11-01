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

/** "south-korea-work-visa" -> "South Korea work visa". */
function alif_seo_topic($slug_part) {
    $words = explode('-', $slug_part);
    $lower = array('visa', 'evisa', 'family', 'work', 'student', 'business', 'visitor', 'transit', 'tourist');
    $out = array();
    foreach ($words as $w) {
        if ($w === 'evisa') { $out[] = 'eVisa'; }
        elseif (in_array($w, array('uae', 'usa', 'uk', 'us', 'nz'), true)) { $out[] = strtoupper($w); }
        elseif (in_array($w, $lower, true)) { $out[] = $w; }
        else { $out[] = ucfirst($w); }
    }
    return implode(' ', $out);
}
/** Fixes "a Austria" -> "an Austria". */
function alif_seo_article($s) {
    return preg_replace('/\ba ([AEIO]|U(?!ni|AE|K\b|S\b|SA))/', 'an $1', $s);
}
/** Topic-specific description built from the post slug; falls back to the first real paragraph. */
function alif_seo_fallback_description($post_id) {
    $slug = (string) get_post_field('post_name', $post_id);
    $base = preg_replace('/(-\d+)+$/', '', $slug);
    $types = array(
        'invitation'      => 'What an invitation letter for a %s should include, who should sign it, the documents to attach and the mistakes that cause refusals.',
        'checklist'       => 'Complete %s document checklist: passport, photos, bank statements and supporting papers, plus tips to avoid delays and refusals.',
        'processing-time' => 'How long a %s takes in 2026, what slows applications down and the documents to have ready so your file is not delayed.',
        'funds'           => 'How much money to show for a %s, which bank statements and sponsor letters count, and how to present your funds clearly.',
        'mistakes'        => 'Common %s mistakes that lead to delays or refusals, and how to avoid them before you submit your application.',
        'appointment'     => 'How to book a %s appointment, what to bring on the day and how to prepare your documents in advance.',
    );
    foreach ($types as $suffix => $tpl) {
        if (substr($base, -strlen($suffix) - 1) === '-' . $suffix) {
            $topic = alif_seo_topic(substr($base, 0, -strlen($suffix) - 1));
            return alif_seo_article(sprintf($tpl, $topic));
        }
    }
    if (preg_match('/^(.*)-from-(pakistan|india)$/', $base, $mm)) {
        $topic = alif_seo_topic($mm[1]);
        $from  = ucfirst($mm[2]);
        return alif_seo_article(sprintf('Applying for a %s from %s: requirements, documents, fees to expect and how to apply step by step.', $topic, $from));
    }
    $html = (string) get_post_field('post_content', $post_id);
    if (preg_match_all('#<p[^>]*>(.*?)</p>#is', $html, $m)) {
        foreach ($m[1] as $p) {
            $txt = trim(preg_replace('/\s+/u', ' ', html_entity_decode(wp_strip_all_tags($p), ENT_QUOTES, 'UTF-8')));
            if (mb_strlen($txt) < 70 || stripos($txt, 'In this article') === 0 || stripos($txt, 'Short answer') === 0) {
                continue;
            }
            if (mb_strlen($txt) > 155) {
                $cut = mb_substr($txt, 0, 155);
                $sp = mb_strrpos($cut, ' ');
                $txt = rtrim(mb_substr($cut, 0, $sp ?: 152), " ,;:-") . '...';
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
