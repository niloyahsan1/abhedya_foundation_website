<?php

namespace Tests\Feature;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\User;
use HasinHayder\Tyro\Models\Role;
use Tests\TestCase;

class AdminResourceTest extends TestCase
{
    protected function getAdminUser(): User
    {
        $role = Role::firstOrCreate(['slug' => 'admin'], ['name' => 'Administrator']);

        $user = User::firstOrCreate(
            ['email' => 'admin_test@abhedyafoundation.org'],
            [
                'name' => 'Admin Tester',
                'password' => bcrypt('StrongSecret123!'),
            ]
        );

        if (! $user->roles()->where('roles.id', $role->id)->exists()) {
            $user->attachRole($role);
        }

        return $user;
    }

    public function test_guest_is_redirected_to_login_from_admin_dashboard(): void
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect('/login');
    }

    public function test_guest_cannot_access_protected_resources(): void
    {
        $response = $this->get('/dashboard/resources/donations');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_admin_can_access_dashboard_and_resources(): void
    {
        $admin = $this->getAdminUser();

        $response = $this->actingAs($admin)->get('/dashboard');
        $response->assertStatus(200);

        $postsResponse = $this->actingAs($admin)->get('/dashboard/resources/posts');
        $postsResponse->assertStatus(200);

        $campaignsResponse = $this->actingAs($admin)->get('/dashboard/resources/campaigns');
        $campaignsResponse->assertStatus(200);

        $donationsResponse = $this->actingAs($admin)->get('/dashboard/resources/donations');
        $donationsResponse->assertStatus(200);
    }

    public function test_campaign_raised_amount_strictly_calculates_verified_donations(): void
    {
        $campaign = Campaign::create([
            'title' => 'Test Medical Camp',
            'slug' => 'test-medical-camp-'.uniqid(),
            'target_amount' => 100000.00,
            'description' => 'Test description',
            'status' => 'active',
            'is_published' => true,
        ]);

        Donation::create([
            'campaign_id' => $campaign->id,
            'donor_name' => 'Verified Donor A',
            'amount' => 20000.00,
            'payment_method' => 'bkash',
            'status' => 'verified',
        ]);

        Donation::create([
            'campaign_id' => $campaign->id,
            'donor_name' => 'Verified Donor B',
            'amount' => 30000.00,
            'payment_method' => 'nagad',
            'status' => 'verified',
        ]);

        Donation::create([
            'campaign_id' => $campaign->id,
            'donor_name' => 'Pending Donor C',
            'amount' => 15000.00,
            'payment_method' => 'rocket',
            'status' => 'pending',
        ]);

        Donation::create([
            'campaign_id' => $campaign->id,
            'donor_name' => 'Rejected Donor D',
            'amount' => 50000.00,
            'payment_method' => 'bank_transfer',
            'status' => 'rejected',
        ]);

        $this->assertEquals(50000.00, $campaign->raised_amount);
        $this->assertEquals(50.0, $campaign->progress_percentage);
    }
}
