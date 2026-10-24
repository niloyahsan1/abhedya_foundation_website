<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AutoTranslationService
{
    /**
     * Translate an English string into Bangla.
     */
    public static function translate(?string $text, string $source = 'en', string $target = 'bn'): ?string
    {
        if (empty($text)) {
            return $text;
        }

        $trimmed = trim($text);

        // If the text is already primarily in Bangla, don't re-translate
        if (preg_match('/[\x{0980}-\x{09FF}]/u', $trimmed)) {
            return $trimmed;
        }

        // 1. Check existing lang dictionary
        $dictTranslation = __($trimmed);
        if ($dictTranslation !== $trimmed) {
            return $dictTranslation;
        }

        // 2. Check Cache
        $cacheKey = "auto_trans_{$source}_{$target}_" . md5($trimmed);
        return Cache::rememberForever($cacheKey, function () use ($trimmed, $source, $target) {
            return self::fetchTranslationFromApi($trimmed, $source, $target);
        });
    }

    /**
     * Fetch translation from external translation service.
     */
    protected static function fetchTranslationFromApi(string $text, string $source, string $target): ?string
    {
        try {
            // Strip HTML for translation if needed, or translate text blocks
            $isHtml = ($text !== strip_tags($text));

            if ($isHtml) {
                // If it contains simple HTML, translate paragraphs or clean text
                $plain = strip_tags($text);
                $translatedPlain = self::callApi($plain, $source, $target);
                if ($translatedPlain) {
                    return '<p>' . nl2br(e($translatedPlain)) . '</p>';
                }
                return null;
            }

            return self::callApi($text, $source, $target);
        } catch (\Throwable $e) {
            Log::warning('AutoTranslationService error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Perform HTTP request to MyMemory / public translation API.
     */
    protected static function callApi(string $text, string $source, string $target): ?string
    {
        $response = Http::withoutVerifying()
            ->timeout(8)
            ->get('https://api.mymemory.translated.net/get', [
                'q' => $text,
                'langpair' => "{$source}|{$target}",
            ]);

        if ($response->successful()) {
            $data = $response->json();
            $translated = $data['responseData']['translatedText'] ?? null;

            if ($translated && !str_contains($translated, 'MYMEMORY WARNING') && !str_contains($translated, 'QUERY LENGTH LIMIT')) {
                $decoded = html_entity_decode($translated, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                self::appendKeyToDictionary($text, $decoded);
                return $decoded;
            }
        }

        return null;
    }

    /**
     * Optionally append newly translated phrase to lang/bn.json.
     */
    protected static function appendKeyToDictionary(string $key, string $value): void
    {
        try {
            $langFile = base_path('lang/bn.json');
            if (File::exists($langFile)) {
                $translations = json_decode(File::get($langFile), true) ?: [];
                if (!isset($translations[$key])) {
                    $translations[$key] = $value;
                    File::put($langFile, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
                }
            }
        } catch (\Throwable $e) {
            // Non-critical, ignore
        }
    }
}
