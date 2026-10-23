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
        $project = Project::published()->latest()->first() ?? Project::create([
            'title' => 'Test Community Project',
            'slug' => 'test-community-project',
            'summary' => 'Summary for testing',
            'description' => 'Detailed description for testing project',
            'status' => 'ongoing',
            'is_published' => true,
        ]);

        $listResponse = $this->get('/projects');
        $listResponse->assertStatus(200);
        $listResponse->assertSee($project->title);

        $detailResponse = $this->get('/projects/'.$project->slug);
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee($project->title);
    }

    public function test_campaigns_page_renders_and_detail_page_works(): void
    {
        $campaign = Campaign::published()->where('status', 'active')->latest()->first() ?? Campaign::create([
            'title' => 'Test Clean Water Campaign',
            'slug' => 'test-clean-water-campaign',
            'short_description' => 'Clean water for test families',
            'description' => 'Full campaign description for clean water wells',
            'target_amount' => 200000.00,
            'status' => 'active',
            'is_published' => true,
        ]);

        $listResponse = $this->get('/campaigns');
        $listResponse->assertStatus(200);
        $listResponse->assertSee($campaign->title);

        $detailResponse = $this->get('/campaigns/'.$campaign->slug);
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee($campaign->title);
    }

    public function test_blog_page_renders_and_detail_page_works(): void
    {
        $post = Post::published()->latest('published_at')->first() ?? Post::create([
            'title' => 'Test Field Update Post',
            'slug' => 'test-field-update-post',
            'summary' => 'Summary of test field post',
            'content' => 'Full article body for field post',
            'is_published' => true,
            'published_at' => now()->subMinute(),
        ]);

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

    public function test_bangla_locale_renders_bengali_navigation_and_content(): void
    {
        // When session has locale 'bn'
        $response = $this->withSession(['locale' => 'bn'])->get('/');
        $response->assertStatus(200);
        $response->assertSee('আমাদের সম্পর্কে');
        $response->assertSee('অনুদান দিন');
        $response->assertSee('প্রকল্পসমূহ');
    }

    public function test_language_switch_route_updates_session_and_redirects(): void
    {
        $response = $this->get('/locale/bn');
        $response->assertRedirect('/');
        $response->assertSessionHas('locale', 'bn');

        $switchEnglish = $this->get('/locale/en');
        $switchEnglish->assertRedirect('/');
        $switchEnglish->assertSessionHas('locale', 'en');
    }

    public function test_query_parameter_lang_sets_locale(): void
    {
        $response = $this->get('/?lang=bn');
        $response->assertStatus(200);
        $response->assertSessionHas('locale', 'bn');
        $response->assertSee('আমাদের সম্পর্কে');
    }

    public function test_default_config_locale_bn_shows_bangla_without_session(): void
    {
        config(['app.locale' => 'bn']);
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('আমাদের সম্পর্কে');
        $response->assertSee('অনুদান দিন');
    }

    public function test_mastul_fonts_are_included_in_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Bornomala-Regular.woff2');
        $response->assertSee('UbuntuSans');
        $response->assertSee('Bornomala');
    }

    public function test_bangla_helpers_convert_numbers_and_dates_accurately(): void
    {
        app()->setLocale('bn');
        $this->assertEquals('০১২৩৪৫৬৭৮৯', bn_num('0123456789'));
        $this->assertEquals('৩৫,০০০+', bn_num('35,000+'));
        $this->assertEquals('৳৫০০,০০০', bn_taka(500000));
        
        $date = \Carbon\Carbon::parse('2026-08-15');
        $this->assertStringContainsString('আগস্ট', bn_date($date, 'M Y'));
        $this->assertStringContainsString('২০২৬', bn_date($date, 'M Y'));
    }

    public function test_all_database_content_translates_to_bangla_in_bn_locale(): void
    {
        $response = $this->withSession(['locale' => 'bn'])->get('/');
        $response->assertStatus(200);
        
        // Brand logo
        $response->assertSee('অভেদ্য');
        $response->assertSee('ফাউন্ডেশন');
        
        // Navigation & Buttons
        $response->assertSee('হোম');
        $response->assertSee('আমাদের সম্পর্কে');
        $response->assertSee('প্রকল্পসমূহ');
        $response->assertSee('ক্যাম্পেইন');
        $response->assertSee('সংবাদ ও ব্লগ');
        $response->assertSee('ফটোগ্যালারি');
        $response->assertSee('যোগাযোগ');
        $response->assertSee('অনুদান দিন');
        
        // Bengali numerals
        $response->assertSee('৪৮');
        $response->assertSee('৩৫,০০০+');
        $response->assertSee('৪৫০+');
        $response->assertSee('১৪');
    }
}
