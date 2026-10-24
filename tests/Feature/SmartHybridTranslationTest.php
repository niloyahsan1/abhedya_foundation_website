<?php

namespace Tests\Feature;

use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SmartHybridTranslationTest extends TestCase
{
    public function test_auto_translates_when_bangla_field_is_empty(): void
    {
        $album = GalleryAlbum::first() ?? GalleryAlbum::create([
            'title' => 'Test Album',
            'slug' => 'test-album-' . uniqid(),
            'is_published' => true,
        ]);

        $image = GalleryImage::create([
            'gallery_album_id' => $album->id,
            'title' => 'Community Relief Aid',
            'caption' => 'Food ration delivery to flooded homes',
            'image' => 'https://example.com/test.jpg',
            'title_bn' => null,
            'caption_bn' => null,
            'is_published' => true,
        ]);

        $this->assertNotNull($image->title_bn);
        $this->assertNotEmpty($image->title_bn);
    }

    public function test_respects_manual_bangla_field_when_provided(): void
    {
        $album = GalleryAlbum::first() ?? GalleryAlbum::create([
            'title' => 'Test Album',
            'slug' => 'test-album-' . uniqid(),
            'is_published' => true,
        ]);

        $image = GalleryImage::create([
            'gallery_album_id' => $album->id,
            'title' => 'School Kits',
            'title_bn' => 'শিক্ষার্থীদের মাঝে স্কুল ব্যাগ ও খাতা বিতরণ',
            'caption' => 'Distributed notebooks and pens',
            'caption_bn' => 'খাতা ও কলম বিতরণ করা হয়',
            'image' => 'https://example.com/test.jpg',
            'is_published' => true,
        ]);

        $this->assertEquals('শিক্ষার্থীদের মাঝে স্কুল ব্যাগ ও খাতা বিতরণ', $image->title_bn);
        $this->assertEquals('খাতা ও কলম বিতরণ করা হয়', $image->caption_bn);
    }

    public function test_display_accessor_switches_based_on_locale(): void
    {
        $album = GalleryAlbum::first() ?? GalleryAlbum::create([
            'title' => 'Test Album',
            'slug' => 'test-album-' . uniqid(),
            'is_published' => true,
        ]);

        $image = GalleryImage::create([
            'gallery_album_id' => $album->id,
            'title' => 'Digital Classroom Project',
            'title_bn' => 'ডিজিটাল ক্লাসরুম প্রকল্প',
            'image' => 'https://example.com/test.jpg',
            'is_published' => true,
        ]);

        app()->setLocale('bn');
        $this->assertEquals('ডিজিটাল ক্লাসরুম প্রকল্প', $image->display_title);

        app()->setLocale('en');
        $this->assertEquals('Digital Classroom Project', $image->display_title);
    }

    public function test_site_setting_resolves_bilingual_values(): void
    {
        SiteSetting::set('test_setting', 'English Value', 'general', 'Test Setting');
        SiteSetting::set('test_setting_bn', 'বাংলা মান', 'general', 'টেস্ট সেটিং');

        app()->setLocale('bn');
        $this->assertEquals('বাংলা মান', SiteSetting::get('test_setting'));

        app()->setLocale('en');
        $this->assertEquals('English Value', SiteSetting::get('test_setting'));
    }
}
