<?php

namespace Tests\Feature;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\Post;
use App\Models\Project;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    public function test_home_page_renders_successfully(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Abhedya Foundation', false);
        $response->assertSee('Featured Projects', false);
    }

    public function test_about_page_renders_successfully(): void
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('About Abhedya Foundation', false);
        $response->assertSee('Our Mission', false);
    }

    public function test_projects_page_renders_and_detail_page_works(): void
    {
        $project = Project::firstOrCreate(
            ['slug' => 'test-community-project'],
            [
                'title' => 'Test Community Project',
                'summary' => 'Summary for testing',
                'description' => 'Detailed description for testing project',
                'status' => 'ongoing',
                'is_published' => true,
            ]
        );

        $listResponse = $this->get('/projects');
        $listResponse->assertStatus(200);
        $listResponse->assertSee($project->title);

        $detailResponse = $this->get('/projects/'.$project->slug);
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee($project->title);
    }

    public function test_campaigns_page_renders_and_detail_page_works(): void
    {
        $campaign = Campaign::firstOrCreate(
            ['slug' => 'test-clean-water-campaign'],
            [
                'title' => 'Test Clean Water Campaign',
                'short_description' => 'Clean water for test families',
                'description' => 'Full campaign description for clean water wells',
                'target_amount' => 200000.00,
                'status' => 'active',
                'is_published' => true,
            ]
        );

        $listResponse = $this->get('/campaigns');
        $listResponse->assertStatus(200);
        $listResponse->assertSee($campaign->title);

        $detailResponse = $this->get('/campaigns/'.$campaign->slug);
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee($campaign->title);
    }

    public function test_blog_page_renders_and_detail_page_works(): void
    {
        $post = Post::firstOrCreate(
            ['slug' => 'test-field-update-post'],
            [
                'title' => 'Test Field Update Post',
                'summary' => 'Summary of test field post',
                'content' => 'Full article body for field post',
                'is_published' => true,
                'published_at' => now(),
            ]
        );

        $listResponse = $this->get('/blog');
        $listResponse->assertStatus(200);
        $listResponse->assertSee($post->title);

        $detailResponse = $this->get('/blog/'.$post->slug);
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee($post->title);
    }

    public function test_gallery_page_renders_successfully(): void
    {
        $response = $this->get('/gallery');
        $response->assertStatus(200);
        $response->assertSee('Photo Gallery', false);
    }

    public function test_donate_page_renders_and_submission_creates_pending_record(): void
    {
        $response = $this->get('/donate');
        $response->assertStatus(200);
        $response->assertSee('bKash Payment', false);

        $donationData = [
            'donor_name' => 'Kazi Nazmul',
            'donor_email' => 'nazmul@example.com',
            'donor_phone' => '01711002233',
            'amount' => 5000.00,
            'payment_method' => 'bkash',
            'transaction_id' => 'BKS-TEST-998877',
            'notes' => 'For child education support',
        ];

        $postResponse = $this->post('/donate', $donationData);
        $postResponse->assertRedirect('/donate');
        $postResponse->assertSessionHas('donation_submitted', true);

        $donation = Donation::where('transaction_id', 'BKS-TEST-998877')->first();
        $this->assertNotNull($donation);
        $this->assertEquals('pending', $donation->status, 'Donations must start with status pending until admin verification');
        $this->assertEquals(5000.00, $donation->amount);
    }

    public function test_donation_submission_rejects_sensitive_pin_or_password_in_notes(): void
    {
        $donationData = [
            'donor_name' => 'Insecure Donor',
            'donor_email' => 'insecure@example.com',
            'amount' => 1000.00,
            'payment_method' => 'bkash',
            'transaction_id' => 'BKS-SECRET-1234',
            'notes' => 'My secret pin is 1234 please process',
        ];

        $postResponse = $this->post('/donate', $donationData);
        $postResponse->assertSessionHasErrors('notes');
    }

    public function test_contact_form_submission_creates_message(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);

        $contactData = [
            'name' => 'Sadia Afrin',
            'email' => 'sadia@example.com',
            'phone' => '01899887766',
            'subject' => 'Volunteering Inquiry',
            'message' => 'I would love to participate in the upcoming flood relief distribution program.',
        ];

        $postResponse = $this->post('/contact', $contactData);
        $postResponse->assertRedirect('/contact');
        $postResponse->assertSessionHas('contact_success');

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'sadia@example.com',
            'subject' => 'Volunteering Inquiry',
            'is_read' => false,
        ]);
    }

    public function test_sitemap_and_robots_txt_render(): void
    {
        $sitemapResponse = $this->get('/sitemap.xml');
        $sitemapResponse->assertStatus(200);
        $sitemapResponse->assertHeader('Content-Type', 'application/xml');

        $robotsResponse = $this->get('/robots.txt');
        $robotsResponse->assertStatus(200);
        $robotsResponse->assertHeader('Content-Type', 'text/plain; charset=UTF-8');
        $robotsResponse->assertSee('Disallow: /dashboard/');
    }
}
