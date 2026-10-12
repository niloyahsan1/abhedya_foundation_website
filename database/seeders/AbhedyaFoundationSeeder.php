<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\CampaignUpdate;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Donation;
use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use App\Models\Post;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AbhedyaFoundationSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::first();

        // 1. Site Settings
        $settings = [
            // General Info
            ['key' => 'site_name', 'label' => 'Site Name', 'value' => 'Abhedya Foundation', 'group' => 'general', 'type' => 'text'],
            ['key' => 'site_tagline', 'label' => 'Tagline', 'value' => 'Empowering Communities, Transforming Lives with Dignity and Hope', 'group' => 'general', 'type' => 'text'],
            ['key' => 'about_short', 'label' => 'Short Introduction', 'value' => 'Abhedya Foundation is dedicated to driving sustainable humanitarian progress, educational upliftment, and community resilience across underserved regions.', 'group' => 'general', 'type' => 'textarea'],
            ['key' => 'mission', 'label' => 'Our Mission', 'value' => 'To uplift marginalized communities by delivering high-impact educational initiatives, essential healthcare access, emergency relief, and sustainable livelihood opportunities.', 'group' => 'general', 'type' => 'textarea'],
            ['key' => 'vision', 'label' => 'Our Vision', 'value' => 'A just, compassionate society where every individual has equal opportunities to thrive with self-reliance, security, and human dignity.', 'group' => 'general', 'type' => 'textarea'],

            // Statistics
            ['key' => 'stat_projects', 'label' => 'Projects Completed', 'value' => '48', 'group' => 'stats', 'type' => 'text'],
            ['key' => 'stat_beneficiaries', 'label' => 'Lives Impacted', 'value' => '35,000+', 'group' => 'stats', 'type' => 'text'],
            ['key' => 'stat_volunteers', 'label' => 'Dedicated Volunteers', 'value' => '450+', 'group' => 'stats', 'type' => 'text'],
            ['key' => 'stat_districts', 'label' => 'Districts Covered', 'value' => '14', 'group' => 'stats', 'type' => 'text'],

            // Contact Information
            ['key' => 'contact_email', 'label' => 'Official Email', 'value' => 'info@abhedyafoundation.org', 'group' => 'contact', 'type' => 'text'],
            ['key' => 'contact_phone', 'label' => 'Contact Telephone', 'value' => '+880 1700-123456', 'group' => 'contact', 'type' => 'text'],
            ['key' => 'contact_address', 'label' => 'Office Address', 'value' => 'House 12, Road 4, Sector 7, Uttara, Dhaka-1230, Bangladesh', 'group' => 'contact', 'type' => 'textarea'],

            // Social Links
            ['key' => 'social_facebook', 'label' => 'Facebook URL', 'value' => 'https://facebook.com/abhedyafoundation', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_twitter', 'label' => 'Twitter/X URL', 'value' => 'https://twitter.com/abhedya_bd', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_linkedin', 'label' => 'LinkedIn URL', 'value' => 'https://linkedin.com/company/abhedyafoundation', 'group' => 'social', 'type' => 'text'],
            ['key' => 'social_youtube', 'label' => 'YouTube Channel', 'value' => 'https://youtube.com/@abhedyafoundation', 'group' => 'social', 'type' => 'text'],

            // Donation Instructions
            ['key' => 'donation_bkash_number', 'label' => 'bKash Merchant/Personal Number', 'value' => '01700-123456', 'group' => 'donation', 'type' => 'text'],
            ['key' => 'donation_nagad_number', 'label' => 'Nagad Number', 'value' => '01800-123456', 'group' => 'donation', 'type' => 'text'],
            ['key' => 'donation_rocket_number', 'label' => 'Rocket Number', 'value' => '01900-123456-7', 'group' => 'donation', 'type' => 'text'],
            ['key' => 'donation_bank_details', 'label' => 'Bank Transfer Details', 'value' => "Bank Name: Dutch-Bangla Bank PLC\nAccount Name: ABHEDYA FOUNDATION\nAccount No: 115.120.0094821\nBranch: Uttara Branch, Dhaka\nRouting No: 090270000", 'group' => 'donation', 'type' => 'textarea'],
            ['key' => 'donation_guidelines', 'label' => 'Donor Instructions', 'value' => 'After completing your transfer via bKash, Nagad, Rocket, or Bank, please submit your transaction details below. Our team verifies every record before marking donations confirmed.', 'group' => 'donation', 'type' => 'textarea'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        // 2. Categories
        $categoriesData = [
            ['name' => 'Education & Literacy', 'description' => 'Programs fostering child education, digital learning, and scholarship stipends.'],
            ['name' => 'Community Healthcare', 'description' => 'Free medical camps, eye screening clinics, and medicine distributions.'],
            ['name' => 'Emergency Relief', 'description' => 'Disaster response, winter clothing distribution, and flood assistance.'],
            ['name' => 'Sustainable Livelihoods', 'description' => 'Vocational training, women empowerment, and small enterprise micro-grants.'],
        ];

        $categories = [];
        foreach ($categoriesData as $c) {
            $categories[$c['name']] = Category::firstOrCreate(
                ['slug' => Str::slug($c['name'])],
                ['name' => $c['name'], 'description' => $c['description']]
            );
        }

        // 3. Tags
        $tagsData = ['Scholarship', 'Flood Relief', 'Winter Drive', 'Free Clinic', 'Women in Tech', 'Clean Water', 'Child Welfare'];
        $tags = [];
        foreach ($tagsData as $t) {
            $tags[$t] = Tag::firstOrCreate(['slug' => Str::slug($t)], ['name' => $t]);
        }

        // 4. Projects
        $projects = [
            [
                'title' => 'Shiksha Alo: Digital Classrooms for Rural Schools',
                'summary' => 'Equipping primary schools in remote riverine islands with solar power, tablets, and interactive multimedia curricula.',
                'description' => 'The Shiksha Alo initiative transforms under-resourced rural schools by introducing solar-powered smart class kits, digital projectors, and curated Bangla digital learning content. Over the past academic year, the program has brought modern education to 1,200 students across 6 remote schools, bridging the digital divide.',
                'status' => 'ongoing',
                'location' => 'Kurigram & Gaibandha Districts',
                'start_date' => '2024-03-01',
                'end_date' => null,
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Niramoy: Mobile Primary Health Clinics',
                'summary' => 'Delivering doorstep primary medical examinations, maternal healthcare, and free prescribed medicines.',
                'description' => 'Our medical team travels monthly across coastal and isolated villages where formal medical centres are hours away. Each clinic provides vital checkups, blood sugar & pressure diagnostics, child nutrition counseling, and maternal wellness kits.',
                'status' => 'ongoing',
                'location' => 'Satkhira & Khulna Coastal Belt',
                'start_date' => '2023-11-15',
                'end_date' => null,
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Clean Water Wells & Sanitation Hubs',
                'summary' => 'Installing deep tubewells and hygienic sanitation blocks in arsenic-affected villages.',
                'description' => 'Safe drinking water remains an acute challenge in salinity and arsenic-prone regions. Abhedya Foundation constructed 24 deep arsenic-free tubewells and sanitary facilities serving over 6,000 villagers daily, drastically curbing waterborne diseases.',
                'status' => 'completed',
                'location' => 'Bagerhat & Chandpur',
                'start_date' => '2023-01-10',
                'end_date' => '2024-02-28',
                'is_published' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Prerona: Vocational Tailoring & Micro-Grants for Widows',
                'summary' => 'Equipping marginalized women with sewing machines and entrepreneurial skills to ensure dignified income.',
                'description' => 'Through an intensive 6-week tailoring and financial literacy boot camp, 80 women received sewing machinery and startup fabric kits. Graduates now generate stable household income through local garment repairs and school uniform orders.',
                'status' => 'completed',
                'location' => 'Bogura & Sirajganj',
                'start_date' => '2023-06-01',
                'end_date' => '2023-12-15',
                'is_published' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($projects as $proj) {
            Project::firstOrCreate(
                ['slug' => Str::slug($proj['title'])],
                array_merge($proj, ['slug' => Str::slug($proj['title'])])
            );
        }

        // 5. Campaigns
        $campaignsData = [
            [
                'title' => 'Emergency Monsoon Flood Relief 2026',
                'short_description' => 'Providing life-saving dry food, drinking water purifiers, and emergency shelter kits to displaced flood survivors.',
                'description' => 'Severe flooding in northeastern Bangladesh has inundated hundreds of homesteads, leaving thousands stranded without access to safe drinking water, dry rations, or sanitation. Abhedya Foundation rescue teams are deploying survival packs containing rice, lentils, oil, oral rehydration salts, water purification tablets, and emergency tarpaulins.',
                'target_amount' => 500000.00,
                'start_date' => '2026-08-01',
                'end_date' => '2026-11-30',
                'status' => 'active',
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Winter Warmth: Blankets & Thermal Clothing for Elders',
                'short_description' => 'Distributing heavy thermal blankets and woolens to vulnerable elderly villagers and infants in northern districts.',
                'description' => 'During peak winter, cold waves severely threaten destitute families in northern rural areas. This campaign aims to distribute 2,500 heavy-grade thermal blankets and sweaters to elderly individuals and street children living below the poverty line.',
                'target_amount' => 350000.00,
                'start_date' => '2026-10-01',
                'end_date' => '2027-01-31',
                'status' => 'active',
                'is_featured' => true,
                'is_published' => true,
            ],
            [
                'title' => 'Annual Secondary School Scholarship Fund',
                'short_description' => 'Funding tuition fees, books, and uniforms for 150 meritorious underprivileged secondary students.',
                'description' => 'Financial distress forces countless bright pupils to drop out before completing their Secondary School Certificate. This scholarship fund covers annual tuition, uniforms, textbooks, and examination registrations, keeping dreams alive.',
                'target_amount' => 600000.00,
                'start_date' => '2025-01-01',
                'end_date' => '2025-12-31',
                'status' => 'completed',
                'is_featured' => false,
                'is_published' => true,
            ],
        ];

        $campaigns = [];
        foreach ($campaignsData as $c) {
            $campaigns[] = Campaign::firstOrCreate(
                ['slug' => Str::slug($c['title'])],
                array_merge($c, ['slug' => Str::slug($c['title'])])
            );
        }

        // Campaign Updates
        if (! empty($campaigns[0])) {
            CampaignUpdate::firstOrCreate(
                ['title' => 'First Batch of 400 Survival Food Packs Distributed in Sylhet'],
                [
                    'campaign_id' => $campaigns[0]->id,
                    'content' => 'Our volunteer volunteers reached 3 remote unions yesterday by boat, successfully delivering essential dry rations, clean drinking water cans, and water purification tablets directly to 400 families stranded at temporary flood shelters.',
                    'published_at' => now()->subDays(5),
                ]
            );
        }

        // 6. Verified and Pending Donations (Real calculation proof)
        $donations = [
            [
                'campaign_id' => $campaigns[0]->id,
                'donor_name' => 'Mohammad Rahat Hasan',
                'donor_email' => 'rahat.hasan@example.com',
                'donor_phone' => '01711223344',
                'amount' => 15000.00,
                'payment_method' => 'bkash',
                'transaction_id' => 'BKS9X84A12',
                'status' => 'verified',
                'verified_by' => $admin?->id,
                'verified_at' => now()->subDays(3),
                'notes' => 'Verified with bKash statement matching reference.',
            ],
            [
                'campaign_id' => $campaigns[0]->id,
                'donor_name' => 'Farhana Akter',
                'donor_email' => 'farhana.akter@example.com',
                'donor_phone' => '01822334455',
                'amount' => 25000.00,
                'payment_method' => 'nagad',
                'transaction_id' => 'NGD7736BB4',
                'status' => 'verified',
                'verified_by' => $admin?->id,
                'verified_at' => now()->subDays(2),
                'notes' => 'Verified through Nagad merchant terminal.',
            ],
            [
                'campaign_id' => $campaigns[0]->id,
                'donor_name' => 'Anonymous Supporter',
                'donor_email' => null,
                'donor_phone' => '01933445566',
                'amount' => 5000.00,
                'payment_method' => 'rocket',
                'transaction_id' => 'RCK4920811',
                'status' => 'pending',
                'verified_by' => null,
                'verified_at' => null,
                'notes' => 'Awaiting statement reconciliation.',
            ],
            [
                'campaign_id' => $campaigns[1]->id,
                'donor_name' => 'Syed Kamrul Islam',
                'donor_email' => 'kamrul.islam@example.com',
                'donor_phone' => '01655667788',
                'amount' => 50000.00,
                'payment_method' => 'bank_transfer',
                'transaction_id' => 'DBBL-TRF-98231',
                'status' => 'verified',
                'verified_by' => $admin?->id,
                'verified_at' => now()->subDay(),
                'notes' => 'Verified on bank account statement.',
            ],
            [
                'campaign_id' => null, // General Foundation Fund
                'donor_name' => 'Dr. Nusrat Jahan',
                'donor_email' => 'nusrat.jahan@example.com',
                'donor_phone' => '01799887766',
                'amount' => 10000.00,
                'payment_method' => 'bkash',
                'transaction_id' => 'BKS39102FF',
                'status' => 'verified',
                'verified_by' => $admin?->id,
                'verified_at' => now()->subHours(12),
                'notes' => 'General charity donation confirmed.',
            ],
        ];

        foreach ($donations as $don) {
            Donation::firstOrCreate(
                ['transaction_id' => $don['transaction_id']],
                $don
            );
        }

        // 7. Posts (Blog & News)
        $postsData = [
            [
                'title' => 'How Community-Led Education Builds Lasting Social Change',
                'category_id' => $categories['Education & Literacy']->id,
                'summary' => 'An in-depth look at our river island digital learning initiative and how parental involvement transformed student attendance.',
                'content' => "Quality education is the cornerstone of generational mobility. In rural chars (river islands), high school drop-out rates frequently stemmed from inaccessible learning resources and seasonal flooding. \n\nBy engaging local village elders, establishing solar electricity setups, and introducing interactive visual teaching aids, Abhedya Foundation helped foster an inclusive classroom climate where attendance has risen by 42% over twelve months.\n\nInvesting in rural young minds isn't charity; it is the most prudent national investment we can ever make.",
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'Responding to the Monsoon Crisis: Voices from the Frontlines',
                'category_id' => $categories['Emergency Relief']->id,
                'summary' => 'Field notes from our emergency disaster relief response team in flooded northeastern villages.',
                'content' => "When heavy runoff overwhelmed the local embankment, over 14 villages woke up submerged under chest-high floodwater. Roads turned into rushing streams, cutting off local food reserves. \n\nOur field coordinators, equipped with community engine boats, worked 18-hour shifts packaging and delivering non-perishable food kits, baby essentials, and chlorine purification tablets. \n\nThanks to transparent community donations, every single taka raised translates directly into life-sustaining aid on the ground.",
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Preventative Healthcare: Why Periodic Village Clinics Matter',
                'category_id' => $categories['Community Healthcare']->id,
                'summary' => 'Preventing chronic ailments before they become life-threatening emergencies through mobile diagnostic camps.',
                'content' => "In remote regions, simple conditions like uncontrolled hypertension or undetected type-2 diabetes routinely evolve into debilitating strokes and kidney failure simply due to a lack of routine testing.\n\nOur Niramoy Mobile Clinics deliver point-of-care diagnostics, prescription medicine, and dietary health literacy directly to villagers' doorsteps, proving that preventative primary healthcare saves both lives and catastrophic medical debt.",
                'is_published' => true,
                'is_featured' => false,
                'published_at' => now()->subDays(12),
            ],
        ];

        foreach ($postsData as $p) {
            $post = Post::firstOrCreate(
                ['slug' => Str::slug($p['title'])],
                array_merge($p, [
                    'slug' => Str::slug($p['title']),
                    'user_id' => $admin?->id,
                ])
            );
            $post->tags()->sync([$tags['Scholarship']->id, $tags['Child Welfare']->id]);
        }

        // 8. Gallery Albums & Images
        $album1 = GalleryAlbum::firstOrCreate(
            ['slug' => 'rural-digital-classrooms'],
            [
                'title' => 'Rural Digital Classrooms in Action',
                'description' => 'Joyful moments of children exploring interactive educational lessons across riverine schools.',
                'order' => 1,
                'is_published' => true,
            ]
        );

        $album2 = GalleryAlbum::firstOrCreate(
            ['slug' => 'flood-relief-distribution-2026'],
            [
                'title' => 'Flood Relief Distribution 2026',
                'description' => 'Emergency response volunteer teams distributing food and clean water in flooded communities.',
                'order' => 2,
                'is_published' => true,
            ]
        );

        $albumImages = [
            [
                'gallery_album_id' => $album1->id,
                'title' => 'Students Engaging with Digital Lessons',
                'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1000&q=80',
                'caption' => 'Primary students gathered around interactive tablet lessons in Kurigram.',
                'order' => 1,
            ],
            [
                'gallery_album_id' => $album1->id,
                'title' => 'Solar Powered Class Setup',
                'image' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=1000&q=80',
                'caption' => 'A refurbished classroom illuminated by sustainable solar energy.',
                'order' => 2,
            ],
            [
                'gallery_album_id' => $album2->id,
                'title' => 'Emergency Food Pack Distribution',
                'image' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=1000&q=80',
                'caption' => 'Distributing essential food ration packets to families at high-ground relief centers.',
                'order' => 1,
            ],
            [
                'gallery_album_id' => $album2->id,
                'title' => 'Clean Water Canister Delivery',
                'image' => 'https://images.unsplash.com/photo-1542810634-71277d95dcbb?auto=format&fit=crop&w=1000&q=80',
                'caption' => 'Delivering potable water jugs and chlorine tablets via boat to stranded households.',
                'order' => 2,
            ],
        ];

        foreach ($albumImages as $img) {
            GalleryImage::firstOrCreate(
                ['title' => $img['title']],
                array_merge($img, ['is_published' => true])
            );
        }

        // 9. Contact Inquiries
        ContactMessage::firstOrCreate(
            ['email' => 'tariq.zaman@example.com'],
            [
                'name' => 'Tariq Zaman',
                'email' => 'tariq.zaman@example.com',
                'phone' => '+880 1712-345678',
                'subject' => 'Volunteering for upcoming winter cloth distribution',
                'message' => 'Hello Abhedya Foundation team, I am a university student in Dhaka and would love to join your upcoming winter blanket drive as a field volunteer. Please let me know how I can register.',
                'is_read' => false,
                'ip_address' => '127.0.0.1',
            ]
        );
    }
}
