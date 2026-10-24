<?php

namespace Tests\Feature;

use App\Models\Campaign;
use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminImageUploadTest extends TestCase
{
    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Find or create admin user with role_id 1
        $this->admin = User::first() ?? User::factory()->create();

        // Ensure user has admin role
        DB::table('user_roles')->updateOrInsert(
            ['user_id' => $this->admin->id, 'role_id' => 1]
        );
    }

    public function test_campaign_edit_page_renders_file_upload_input(): void
    {
        $campaign = Campaign::first() ?? Campaign::create([
            'title' => 'Test Campaign',
            'slug' => 'test-campaign',
            'description' => 'Test description',
            'target_amount' => 50000,
            'status' => 'active',
        ]);

        $response = $this->actingAs($this->admin)->get('/dashboard/resources/campaigns/' . $campaign->id . '/edit');

        $response->assertStatus(200);
        $response->assertSee('type="file"', false);
        $response->assertSee('name="featured_image"', false);
        $response->assertDontSee('type="image" name="featured_image"', false);
    }

    public function test_gallery_image_edit_page_renders_file_upload_input(): void
    {
        $album = GalleryAlbum::first() ?? GalleryAlbum::create([
            'title' => 'Test Album',
            'slug' => 'test-album',
        ]);

        $galleryImage = GalleryImage::first() ?? GalleryImage::create([
            'gallery_album_id' => $album->id,
            'title' => 'Test Image',
            'image' => 'https://images.unsplash.com/photo-test',
        ]);

        $response = $this->actingAs($this->admin)->get('/dashboard/resources/gallery_images/' . $galleryImage->id . '/edit');

        $response->assertStatus(200);
        $response->assertSee('type="file"', false);
        $response->assertSee('name="image"', false);
        $response->assertDontSee('type="image" name="image"', false);
    }

    public function test_campaign_can_upload_new_image(): void
    {
        Storage::fake('public');

        $campaign = Campaign::first() ?? Campaign::create([
            'title' => 'Test Campaign',
            'slug' => 'test-campaign',
            'description' => 'Test description',
            'target_amount' => 50000,
            'status' => 'active',
        ]);

        $file = UploadedFile::fake()->image('flood-relief.jpg', 800, 600);

        $response = $this->actingAs($this->admin)->put('/dashboard/resources/campaigns/' . $campaign->id, [
            'title' => $campaign->title,
            'slug' => $campaign->slug,
            'target_amount' => $campaign->target_amount,
            'status' => $campaign->status,
            'short_description' => $campaign->short_description,
            'description' => $campaign->description,
            'featured_image' => $file,
            'is_published' => 1,
        ]);

        $response->assertSessionHasNoErrors();
        $campaign->refresh();

        $this->assertNotNull($campaign->featured_image);
        $this->assertStringStartsWith('/storage/uploads/', $campaign->featured_image);
    }

    public function test_gallery_image_can_be_updated_without_reuploading_file(): void
    {
        $album = GalleryAlbum::first() ?? GalleryAlbum::create([
            'title' => 'Test Album',
            'slug' => 'test-album',
        ]);

        $galleryImage = GalleryImage::first() ?? GalleryImage::create([
            'gallery_album_id' => $album->id,
            'title' => 'Test Image',
            'image' => 'https://images.unsplash.com/photo-test',
        ]);

        $originalImage = $galleryImage->getRawOriginal('image');

        $response = $this->actingAs($this->admin)->put('/dashboard/resources/gallery_images/' . $galleryImage->id, [
            'title' => 'Updated Gallery Title',
            'gallery_album_id' => $galleryImage->gallery_album_id,
            'caption' => 'Updated Caption',
            'is_published' => 1,
        ]);

        $response->assertSessionHasNoErrors();
        $galleryImage->refresh();

        $this->assertEquals('Updated Gallery Title', $galleryImage->title);
        $this->assertEquals('Updated Caption', $galleryImage->caption);
        $this->assertEquals($originalImage, $galleryImage->getRawOriginal('image'));
    }
}
