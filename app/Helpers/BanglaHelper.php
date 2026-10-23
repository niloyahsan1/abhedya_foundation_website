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
