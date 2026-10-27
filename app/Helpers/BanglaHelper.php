<?php

if (!function_exists('bn_num')) {
    function bn_num($str): string
    {
        if (app()->getLocale() !== 'bn') {
            return (string) $str;
        }

        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];

        return str_replace($en, $bn, (string) $str);
    }
}

if (!function_exists('bn_date')) {
    function bn_date($date, string $format = 'M d, Y'): string
    {
        if (! $date instanceof \DateTimeInterface) {
            return (string) $date;
        }

        $formatted = $date->format($format);

        if (app()->getLocale() !== 'bn') {
            return $formatted;
        }

        $monthsEn = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December',
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec',
        ];

        $monthsBn = [
            'জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন',
            'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর',
            'জানু', 'ফেব্রু', 'মার্চ', 'এপ্রিল', 'মে', 'জুন',
            'জুলাই', 'আগস্ট', 'সেপ্টে', 'অক্টো', 'নভে', 'ডিসে',
        ];

        $result = str_replace($monthsEn, $monthsBn, $formatted);

        return bn_num($result);
    }
}

if (!function_exists('bn_taka')) {
    function bn_taka($amount): string
    {
        $num = number_format((float) $amount);
        return '৳' . bn_num($num);
    }
}

if (!function_exists('clean_html_content')) {
    /**
     * Clean and normalize rich text / body content.
     * - Removes empty paragraphs like <p><br></p> and <p>&nbsp;</p> that cause double spacing.
     * - Collapses redundant line breaks.
     * - Formats plain text into semantic <p> paragraphs.
     */
    function clean_html_content(?string $content): string
    {
        if (empty($content)) {
            return '';
        }

        $trimmed = trim($content);

        // Check if content already contains HTML tags (e.g. from rich editor)
        if ($trimmed !== strip_tags($trimmed)) {
            // 1. Remove empty/whitespace paragraphs often inserted by rich text editors
            $cleaned = preg_replace('/<p\b[^>]*>(\s*|<br\s*\/?>|&nbsp;)*<\/p>/i', '', $trimmed);
            // 2. Collapse consecutive <br> tags
            $cleaned = preg_replace('/(<br\s*\/?>\s*){2,}/i', '<br />', $cleaned);
            return trim($cleaned);
        }

        // It is plain text: split on double newlines to form clean paragraphs without double spacing
        $paragraphs = preg_split('/\r\n\r\n|\n\n|\r\r/', $trimmed);
        $html = '';
        foreach ($paragraphs as $para) {
            $p = trim($para);
            if ($p !== '') {
                $html .= '<p>' . nl2br(e($p)) . '</p>';
            }
        }

        return $html ?: nl2br(e($trimmed));
    }
}

if (!function_exists('bn_content')) {
    /**
     * Translate and format rich text / body content cleanly.
     * Prevents escaping of valid HTML while guaranteeing translation lookup and proper paragraph spacing.
     */
    function bn_content(?string $content): string
    {
        if (empty($content)) {
            return '';
        }

        // Clean redundant empty lines / paragraphs first
        $cleaned = clean_html_content($content);

        // If English locale:
        if (app()->getLocale() !== 'bn') {
            return $cleaned;
        }

        // Locale is Bangla:
        // 1. Direct exact translation
        $translated = __($content);
        if ($translated !== $content) {
            return clean_html_content($translated);
        }

        // 2. If content is wrapped in <p>...</p>, check inner text translation
        $trimmed = trim($content);
        if (preg_match('/^<p>(.*?)<\/p>$/s', $trimmed, $matches)) {
            $inner = trim($matches[1]);
            $innerTranslated = __($inner);
            if ($innerTranslated !== $inner) {
                return '<p>' . clean_html_content($innerTranslated) . '</p>';
            }
        }

        // 3. Check plain stripped text translation
        $plain = trim(strip_tags($content));
        $plainTranslated = __($plain);
        if ($plainTranslated !== $plain) {
            return clean_html_content($plainTranslated);
        }

        return $cleaned;
    }
}

if (!function_exists('bn_bank_details')) {
    /**
     * Format and translate bank transfer details reliably.
     * Supports full text matching, newline normalization, and line-by-line fallback.
     */
    function bn_bank_details(?string $details): string
    {
        if (empty($details)) {
            return '';
        }

        if (app()->getLocale() !== 'bn') {
            return $details;
        }

        // 1. Direct translation match
        $translated = __($details);
        if ($translated !== $details) {
            return $translated;
        }

        // 2. Normalize newlines and check
        $normalized = str_replace("\r\n", "\n", $details);
        $normTranslated = __($normalized);
        if ($normTranslated !== $normalized) {
            return $normTranslated;
        }

        // 3. Fallback to line-by-line translation
        $lines = explode("\n", $normalized);
        $translatedLines = [];
        foreach ($lines as $line) {
            $trimmed = trim($line);
            if ($trimmed === '') {
                $translatedLines[] = '';
                continue;
            }
            $lineTrans = __($trimmed);
            if ($lineTrans !== $trimmed) {
                $translatedLines[] = $lineTrans;
            } else {
                if (str_contains($trimmed, ':')) {
                    [$k, $v] = explode(':', $trimmed, 2);
                    $kTrans = __(trim($k));
                    $vTrans = __(trim($v));
                    if ($vTrans === trim($v)) {
                        $vTrans = bn_num($vTrans);
                    }
                    $translatedLines[] = $kTrans . ': ' . $vTrans;
                } else {
                    $translatedLines[] = bn_num($trimmed);
                }
            }
        }

        return implode("\n", $translatedLines);
    }
}

