<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Route Configuration
    |--------------------------------------------------------------------------
    |
    | Configure the dashboard routes prefix and middleware.
    |
    */
    'routes' => [
        'prefix' => env('TYRO_DASHBOARD_PREFIX', 'dashboard'),
        'middleware' => ['web', 'auth'],
        'name_prefix' => 'tyro-dashboard.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Roles
    |--------------------------------------------------------------------------
    |
    | Users with these roles will have full access to admin features
    | (user management, role management, privilege management, settings).
    |
    */
    'admin_roles' => ['admin', 'super-admin'],

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    |
    | The user model to use throughout the dashboard.
    |
    */
    'user_model' => env('TYRO_DASHBOARD_USER_MODEL', 'App\\Models\\User'),

    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    |
    | Default pagination settings for lists.
    |
    */
    'pagination' => [
        'users' => 15,
        'roles' => 15,
        'privileges' => 15,
    ],

    /*
    |--------------------------------------------------------------------------
    | Branding
    |--------------------------------------------------------------------------
    |
    | Customize the dashboard appearance.
    |
    */
    'branding' => [
        'app_name' => env('TYRO_DASHBOARD_APP_NAME', env('APP_NAME', 'Abhedya Foundation')),
        'logo' => env('TYRO_DASHBOARD_LOGO', '/images/website_logo.png'),
        'logo_height' => env('TYRO_DASHBOARD_LOGO_HEIGHT', '34px'),
        'favicon' => env('TYRO_DASHBOARD_FAVICON', '/images/favicon-32x32.png'),

        // Sidebar colors (supports any CSS color value: hex, rgb, hsl, etc.)
        'sidebar_bg' => env('TYRO_DASHBOARD_SIDEBAR_BG', null), // Custom background color for sidebar
        'sidebar_text' => env('TYRO_DASHBOARD_SIDEBAR_TEXT', null), // Custom text color for sidebar
        'sidebar_primary' => env('TYRO_DASHBOARD_SIDEBAR_PRIMARY', null), // Custom text color for sidebar
        'sidebar_accent' => env('TYRO_DASHBOARD_SIDEBAR_ACCENT', null), // Custom text color for sidebar
        'sidebar_accent_foreground' => env('TYRO_DASHBOARD_SIDEBAR_ACCENT_FOREGROUND', null), // Custom text color for sidebar
        'sidebar_header_border' => env('TYRO_DASHBOARD_SIDEBAR_HEADER_BORDER', null), // Custom text color for sidebar
        'sidebar_accordion_compact' => filter_var(env('TYRO_DASHBOARD_SIDEBAR_ACCORDION_COMPACT', false), FILTER_VALIDATE_BOOLEAN),
        'sidebar_accordion_open_sections' => (int) env('TYRO_DASHBOARD_SIDEBAR_ACCORDION_OPEN_SECTIONS', 1),
        'sidebar_logo' => env('TYRO_DASHBOARD_SIDEBAR_LOGO', null),
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Bar
    |--------------------------------------------------------------------------
    |
    | Configuration for the admin notice bar displayed at the top of the dashboard.
    |
    */
    'admin_bar' => [
        'enabled' => env('TYRO_DASHBOARD_ADMIN_BAR_ENABLED', false),
        'message' => env('TYRO_DASHBOARD_ADMIN_BAR_MESSAGE', ''),
        'bg_color' => env('TYRO_DASHBOARD_ADMIN_BAR_BG_COLOR', '#000000'),
        'text_color' => env('TYRO_DASHBOARD_ADMIN_BAR_TEXT_COLOR', '#ffffff'),
        'align' => env('TYRO_DASHBOARD_ADMIN_BAR_ALIGN', 'left'),
        'height' => env('TYRO_DASHBOARD_ADMIN_BAR_HEIGHT', '40px'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Collapsible Sidebar
    |--------------------------------------------------------------------------
    |
    | Enable or disable the collapsible sidebar feature.
    |
    */
    'collapsible_sidebar' => env('TYRO_DASHBOARD_COLLAPSIBLE_SIDEBAR', true),

    /*
    |--------------------------------------------------------------------------
    | Features
    |--------------------------------------------------------------------------
    |
    | Enable or disable specific dashboard features.
    |
    */
    'features' => [
        'user_management' => true,
        'role_management' => true,
        'privilege_management' => true,
        'settings_management' => true,
        'profile_management' => true,
        'invitation_system' => env('TYRO_DASHBOARD_ENABLE_INVITATION', true),
        'audit_logs' => env('TYRO_DASHBOARD_ENABLE_AUDIT_LOGS', true),
        'system_settings' => env('TYRO_DASHBOARD_ENABLE_SYSTEM_SETTINGS', true),
        'smtp_settings' => env('TYRO_DASHBOARD_ENABLE_SMTP_SETTINGS', true),
        'emailer' => env('TYRO_DASHBOARD_ENABLE_EMAILER', false),
        'checkpoints' => env('TYRO_DASHBOARD_ENABLE_CHECKPOINTS', true),
        'health' => env('TYRO_DASHBOARD_ENABLE_HEALTH', true),
        'log_viewer' => env('TYRO_DASHBOARD_ENABLE_LOG_VIEWER', true),
        'show_roles_menu' => env('TYRO_DASHBOARD_SHOW_ROLES_MENU', true),
        'show_privileges_menu' => env('TYRO_DASHBOARD_SHOW_PRIVILEGES_MENU', true),
        'show_resources_menu' => env('TYRO_DASHBOARD_SHOW_RESOURCES_MENU', true),
        'activity_log' => false, // Future feature
        'profile_photo_upload' => env('TYRO_DASHBOARD_ENABLE_PROFILE_PHOTO', false),
        'gravatar' => env('TYRO_DASHBOARD_ENABLE_GRAVATAR', false),
        'heartbeat' => env('TYRO_DASHBOARD_ENABLE_HEARTBEAT', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Heartbeat
    |--------------------------------------------------------------------------
    |
    | Online-user detection window (in seconds) for the cache-based heartbeat.
    | Should be at least twice the 5-minute frontend interval so a single
    | missed beat does not mark a user offline.
    |
    */
    'heartbeat_ttl' => (int) env('TYRO_DASHBOARD_HEARTBEAT_TTL', 600),

    /*
    |--------------------------------------------------------------------------
    | Protected Resources
    |--------------------------------------------------------------------------
    |
    | Resources that cannot be deleted through the dashboard.
    |
    */
    'protected' => [
        'roles' => ['admin', 'super-admin', 'user'],
        'users' => [], // Add user IDs that cannot be deleted
    ],

    /*
    |--------------------------------------------------------------------------
    | Dashboard Widgets
    |--------------------------------------------------------------------------
    |
    | Configure which widgets appear on the dashboard home.
    |
    */
    'widgets' => [
        'stats' => true,
        'recent_users' => true,
        'role_distribution' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    |
    | Configure dashboard notifications behavior.
    |
    */
    'notifications' => [
        'show_flash_messages' => true,
        'auto_dismiss_seconds' => 5,
        'notification_style' => env('TYRO_DASHBOARD_NOTIFICATION_STYLE', 'legacy'), // 'legacy' or 'toast'
        'toast_position' => env('TYRO_DASHBOARD_TOAST_POSITION', 'bottom-right'), // 'top-right' or 'bottom-right'
    ],

    /*
    |--------------------------------------------------------------------------
    | File Upload Configuration
    |--------------------------------------------------------------------------
    |
    | Configure default settings for file uploads in resources.
    |
    */
    'uploads' => [
        'disk' => env('TYRO_DASHBOARD_UPLOAD_DISK', 'public'),
        'directory' => env('TYRO_DASHBOARD_UPLOAD_DIRECTORY', 'uploads'),
        'auto_delete_on_resource_delete' => env('TYRO_DASHBOARD_AUTO_DELETE_UPLOADS', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Profile Photo Configuration
    |--------------------------------------------------------------------------
    |
    | Configure settings for user profile photos and gravatar support.
    |
    */
    'profile_photo' => [
        'disk' => env('TYRO_DASHBOARD_PROFILE_PHOTO_DISK', 'public'),
        'directory' => env('TYRO_DASHBOARD_PROFILE_PHOTO_DIRECTORY', 'profile_images'),
        'max_size' => env('TYRO_DASHBOARD_PROFILE_PHOTO_MAX_SIZE', 10240), // in KB (default 10MB)
        'width' => env('TYRO_DASHBOARD_PROFILE_PHOTO_WIDTH', 400),
        'height' => env('TYRO_DASHBOARD_PROFILE_PHOTO_HEIGHT', 400),
        'quality' => env('TYRO_DASHBOARD_PROFILE_PHOTO_QUALITY', 90),
        'crop_position' => env('TYRO_DASHBOARD_PROFILE_PHOTO_CROP', 'center'), // top, center, bottom
        'allowed_types' => ['jpg', 'jpeg', 'png', 'gif', 'webp'],
        'auto_delete_on_user_delete' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Dynamic Resources (CRUD)
    |--------------------------------------------------------------------------
    |
    | Define your resources here to automatically generate CRUD interfaces.
    |
    */
    // 'resources' => [
    //     // Example:
    //     // 'posts' => [
    //     //     'model' => 'App\Models\Post',
    //     //     'title' => 'Posts',
    //     //     'icon' => '<svg>...</svg>', // Optional SVG icon
    //     //     'fields' => [
    //     //         'title' => ['type' => 'text', 'label' => 'Title', 'rules' => 'required'],
    //     //         'content' => ['type' => 'textarea', 'label' => 'Content'],
    //     //     ],
    //     // ],
    // ],
    'resources' => [
        'posts' => [
            'model' => 'App\\Models\\Post',
            'title' => 'Blog Posts',
            'title_singular' => 'Blog Post',
            'roles' => ['admin', 'super-admin', 'editor'],
            'fields' => [
                'featured_image' => ['type' => 'file', 'label' => 'Cover', 'display_image' => true, 'display_image_position' => 'top', 'rules' => 'nullable|image|max:10240'],
                'title' => ['type' => 'text', 'label' => 'Title (English)', 'rules' => 'required|max:255', 'searchable' => true, 'sortable' => true],
                'title_bn' => ['type' => 'text', 'label' => 'Title (বাংলা - Optional)', 'rules' => 'nullable|max:255', 'hide_in_index' => true],
                'slug' => ['type' => 'text', 'label' => 'Slug', 'rules' => 'required|max:255', 'hide_in_index' => true],
                'category_id' => [
                    'type' => 'select',
                    'label' => 'Category',
                    'relationship' => 'category',
                    'option_label' => 'name',
                    'rules' => 'nullable|exists:categories,id',
                ],
                'summary' => ['type' => 'textarea', 'label' => 'Summary (English)', 'rules' => 'nullable', 'hide_in_index' => true],
                'summary_bn' => ['type' => 'textarea', 'label' => 'Summary (বাংলা - Optional)', 'rules' => 'nullable', 'hide_in_index' => true],
                'content' => ['type' => 'richtext', 'label' => 'Content (English)', 'rules' => 'required', 'hide_in_index' => true],
                'content_bn' => ['type' => 'richtext', 'label' => 'Content (বাংলা - Optional)', 'rules' => 'nullable', 'hide_in_index' => true],
                'is_published' => ['type' => 'boolean', 'label' => 'Published', 'sortable' => true],
                'is_featured' => ['type' => 'boolean', 'label' => 'Featured on Home', 'sortable' => true],
                'published_at' => ['type' => 'datetime', 'label' => 'Published Date', 'sortable' => true],
            ],
        ],

        'projects' => [
            'model' => 'App\\Models\\Project',
            'title' => 'Projects & Activities',
            'title_singular' => 'Project',
            'roles' => ['admin', 'super-admin', 'editor'],
            'fields' => [
                'featured_image' => ['type' => 'file', 'label' => 'Cover', 'display_image' => true, 'display_image_position' => 'top', 'rules' => 'nullable|image|max:10240'],
                'title' => ['type' => 'text', 'label' => 'Project Title (English)', 'rules' => 'required|max:255', 'searchable' => true, 'sortable' => true],
                'title_bn' => ['type' => 'text', 'label' => 'Project Title (বাংলা - Optional)', 'rules' => 'nullable|max:255', 'hide_in_index' => true],
                'slug' => ['type' => 'text', 'label' => 'Slug', 'rules' => 'required|max:255', 'hide_in_index' => true],
                'status' => ['type' => 'select', 'label' => 'Status', 'options' => ['planning' => 'Planning', 'ongoing' => 'Ongoing', 'completed' => 'Completed'], 'rules' => 'required'],
                'location' => ['type' => 'text', 'label' => 'Location / District (English)', 'rules' => 'nullable|max:255'],
                'location_bn' => ['type' => 'text', 'label' => 'Location / District (বাংলা - Optional)', 'rules' => 'nullable|max:255', 'hide_in_index' => true],
                'summary' => ['type' => 'textarea', 'label' => 'Summary (English)', 'rules' => 'nullable', 'hide_in_index' => true],
                'summary_bn' => ['type' => 'textarea', 'label' => 'Summary (বাংলা - Optional)', 'rules' => 'nullable', 'hide_in_index' => true],
                'description' => ['type' => 'richtext', 'label' => 'Full Description (English)', 'rules' => 'required', 'hide_in_index' => true],
                'description_bn' => ['type' => 'richtext', 'label' => 'Full Description (বাংলা - Optional)', 'rules' => 'nullable', 'hide_in_index' => true],
                'start_date' => ['type' => 'date', 'label' => 'Start Date', 'rules' => 'nullable', 'hide_in_index' => true],
                'end_date' => ['type' => 'date', 'label' => 'End Date', 'rules' => 'nullable', 'hide_in_index' => true],
                'is_published' => ['type' => 'boolean', 'label' => 'Published', 'sortable' => true],
                'is_featured' => ['type' => 'boolean', 'label' => 'Featured on Home', 'sortable' => true],
            ],
        ],

        'campaigns' => [
            'model' => 'App\\Models\\Campaign',
            'title' => 'Fundraising Campaigns',
            'title_singular' => 'Campaign',
            'roles' => ['admin', 'super-admin', 'editor'],
            'fields' => [
                'featured_image' => ['type' => 'file', 'label' => 'Cover', 'display_image' => true, 'display_image_position' => 'top', 'rules' => 'nullable|image|max:10240'],
                'title' => ['type' => 'text', 'label' => 'Campaign Title (English)', 'rules' => 'required|max:255', 'searchable' => true, 'sortable' => true],
                'title_bn' => ['type' => 'text', 'label' => 'Campaign Title (বাংলা - Optional)', 'rules' => 'nullable|max:255', 'hide_in_index' => true],
                'slug' => ['type' => 'text', 'label' => 'Slug', 'rules' => 'required|max:255', 'hide_in_index' => true],
                'target_amount' => ['type' => 'number', 'label' => 'Target (BDT)', 'rules' => 'required|numeric|min:0', 'sortable' => true],
                'status' => ['type' => 'select', 'label' => 'Status', 'options' => ['active' => 'Active', 'completed' => 'Completed', 'paused' => 'Paused'], 'rules' => 'required'],
                'short_description' => ['type' => 'textarea', 'label' => 'Short Summary (English)', 'rules' => 'nullable', 'hide_in_index' => true],
                'short_description_bn' => ['type' => 'textarea', 'label' => 'Short Summary (বাংলা - Optional)', 'rules' => 'nullable', 'hide_in_index' => true],
                'description' => ['type' => 'richtext', 'label' => 'Full Campaign Details (English)', 'rules' => 'required', 'hide_in_index' => true],
                'description_bn' => ['type' => 'richtext', 'label' => 'Full Campaign Details (বাংলা - Optional)', 'rules' => 'nullable', 'hide_in_index' => true],
                'start_date' => ['type' => 'date', 'label' => 'Start Date', 'rules' => 'nullable', 'hide_in_index' => true],
                'end_date' => ['type' => 'date', 'label' => 'End Date', 'rules' => 'nullable', 'hide_in_index' => true],
                'is_published' => ['type' => 'boolean', 'label' => 'Published', 'sortable' => true],
                'is_featured' => ['type' => 'boolean', 'label' => 'Featured on Home', 'sortable' => true],
            ],
        ],

        'campaign_updates' => [
            'model' => 'App\\Models\\CampaignUpdate',
            'title' => 'Campaign Updates',
            'title_singular' => 'Campaign Update',
            'roles' => ['admin', 'super-admin', 'editor'],
            'fields' => [
                'campaign_id' => [
                    'type' => 'select',
                    'label' => 'Campaign',
                    'relationship' => 'campaign',
                    'option_label' => 'title',
                    'rules' => 'required|exists:campaigns,id',
                ],
                'title' => ['type' => 'text', 'label' => 'Update Title', 'rules' => 'required|max:255', 'searchable' => true],
                'content' => ['type' => 'richtext', 'label' => 'Update Content', 'rules' => 'required', 'hide_in_index' => true],
                'image' => ['type' => 'file', 'label' => 'Update Image', 'display_image' => true, 'display_image_position' => 'top', 'rules' => 'nullable|image|max:10240'],
                'published_at' => ['type' => 'datetime', 'label' => 'Date', 'rules' => 'nullable'],
            ],
        ],

        'donations' => [
            'model' => 'App\\Models\\Donation',
            'title' => 'Donation Records',
            'title_singular' => 'Donation Record',
            'roles' => ['admin', 'super-admin'],
            'readonly' => ['editor'],
            'fields' => [
                'donor_name' => ['type' => 'text', 'label' => 'Donor Name', 'rules' => 'required|max:255', 'searchable' => true, 'sortable' => true],
                'donor_email' => ['type' => 'text', 'label' => 'Donor Email', 'rules' => 'nullable|email'],
                'donor_phone' => ['type' => 'text', 'label' => 'Donor Phone', 'rules' => 'nullable|max:50'],
                'amount' => ['type' => 'number', 'label' => 'Amount (BDT)', 'rules' => 'required|numeric|min:1', 'sortable' => true],
                'payment_method' => ['type' => 'select', 'label' => 'Payment Method', 'options' => ['bkash' => 'bKash', 'nagad' => 'Nagad', 'rocket' => 'Rocket', 'bank_transfer' => 'Bank Transfer'], 'rules' => 'required'],
                'transaction_id' => ['type' => 'text', 'label' => 'Transaction ID', 'rules' => 'nullable|max:100', 'searchable' => true],
                'campaign_id' => [
                    'type' => 'select',
                    'label' => 'Assigned Campaign',
                    'relationship' => 'campaign',
                    'option_label' => 'title',
                    'rules' => 'nullable|exists:campaigns,id',
                ],
                'status' => ['type' => 'select', 'label' => 'Status', 'options' => ['pending' => 'Pending Verification', 'verified' => 'Verified', 'rejected' => 'Rejected'], 'rules' => 'required', 'sortable' => true],
                'notes' => ['type' => 'textarea', 'label' => 'Verification Notes', 'rules' => 'nullable', 'hide_in_index' => true],
                'rejection_reason' => ['type' => 'textarea', 'label' => 'Rejection Reason (if rejected)', 'rules' => 'nullable', 'hide_in_index' => true],
            ],
        ],

        'gallery_albums' => [
            'model' => 'App\\Models\\GalleryAlbum',
            'title' => 'Gallery Albums',
            'title_singular' => 'Gallery Album',
            'roles' => ['admin', 'super-admin', 'editor'],
            'fields' => [
                'cover_image' => ['type' => 'file', 'label' => 'Cover Image', 'display_image' => true, 'display_image_position' => 'top', 'rules' => 'nullable|image|max:10240'],
                'title' => ['type' => 'text', 'label' => 'Album Title (English)', 'rules' => 'required|max:255', 'searchable' => true],
                'title_bn' => ['type' => 'text', 'label' => 'Album Title (বাংলা - Optional)', 'rules' => 'nullable|max:255', 'hide_in_index' => true],
                'slug' => ['type' => 'text', 'label' => 'Slug', 'rules' => 'required|max:255', 'hide_in_index' => true],
                'description' => ['type' => 'textarea', 'label' => 'Description (English)', 'rules' => 'nullable', 'hide_in_index' => true],
                'description_bn' => ['type' => 'textarea', 'label' => 'Description (বাংলা - Optional)', 'rules' => 'nullable', 'hide_in_index' => true],
                'order' => ['type' => 'number', 'label' => 'Display Order', 'rules' => 'nullable|integer', 'sortable' => true],
                'is_published' => ['type' => 'boolean', 'label' => 'Published', 'sortable' => true],
            ],
        ],

        'gallery_images' => [
            'model' => 'App\\Models\\GalleryImage',
            'title' => 'Gallery Images',
            'title_singular' => 'Gallery Image',
            'roles' => ['admin', 'super-admin', 'editor'],
            'fields' => [
                'image' => ['type' => 'file', 'label' => 'Photo', 'display_image' => true, 'display_image_position' => 'top', 'rules' => 'nullable|image|max:10240'],
                'title' => ['type' => 'text', 'label' => 'Image Title (English)', 'rules' => 'nullable|max:255', 'searchable' => true],
                'title_bn' => ['type' => 'text', 'label' => 'Image Title (বাংলা - Optional)', 'rules' => 'nullable|max:255', 'hide_in_index' => true],
                'gallery_album_id' => [
                    'type' => 'select',
                    'label' => 'Album',
                    'relationship' => 'album',
                    'option_label' => 'title',
                    'rules' => 'nullable|exists:gallery_albums,id',
                ],
                'caption' => ['type' => 'textarea', 'label' => 'Caption (English)', 'rules' => 'nullable', 'hide_in_index' => true],
                'caption_bn' => ['type' => 'textarea', 'label' => 'Caption (বাংলা - Optional)', 'rules' => 'nullable', 'hide_in_index' => true],
                'order' => ['type' => 'number', 'label' => 'Display Order', 'rules' => 'nullable|integer', 'sortable' => true],
                'is_published' => ['type' => 'boolean', 'label' => 'Published', 'sortable' => true],
            ],
        ],

        'contact_messages' => [
            'model' => 'App\\Models\\ContactMessage',
            'title' => 'Contact Messages',
            'title_singular' => 'Contact Message',
            'roles' => ['admin', 'super-admin', 'editor'],
            'fields' => [
                'name' => ['type' => 'text', 'label' => 'Sender Name', 'rules' => 'required|max:255', 'searchable' => true],
                'email' => ['type' => 'text', 'label' => 'Email', 'rules' => 'required|email', 'searchable' => true],
                'phone' => ['type' => 'text', 'label' => 'Phone', 'rules' => 'nullable|max:50'],
                'subject' => ['type' => 'text', 'label' => 'Subject', 'rules' => 'required|max:255', 'searchable' => true],
                'message' => ['type' => 'textarea', 'label' => 'Message', 'rules' => 'required', 'hide_in_index' => true],
                'is_read' => ['type' => 'boolean', 'label' => 'Mark as Read', 'sortable' => true],
            ],
        ],

        'categories' => [
            'model' => 'App\\Models\\Category',
            'title' => 'Categories',
            'title_singular' => 'Category',
            'roles' => ['admin', 'super-admin', 'editor'],
            'fields' => [
                'name' => ['type' => 'text', 'label' => 'Category Name', 'rules' => 'required|max:255', 'searchable' => true],
                'slug' => ['type' => 'text', 'label' => 'Slug', 'rules' => 'required|max:255', 'hide_in_index' => true],
                'description' => ['type' => 'textarea', 'label' => 'Description', 'rules' => 'nullable', 'hide_in_index' => true],
            ],
        ],

        'site_settings' => [
            'model' => 'App\\Models\\SiteSetting',
            'title' => 'Site Settings',
            'title_singular' => 'Setting',
            'roles' => ['admin', 'super-admin'],
            'fields' => [
                'key' => ['type' => 'text', 'label' => 'Setting Key', 'rules' => 'required|max:100', 'searchable' => true],
                'label' => ['type' => 'text', 'label' => 'Display Label', 'rules' => 'required|max:255'],
                'group' => ['type' => 'select', 'label' => 'Group', 'options' => ['general' => 'General', 'stats' => 'Statistics', 'contact' => 'Contact Info', 'donation' => 'Donation Instructions', 'social' => 'Social Media'], 'rules' => 'required'],
                'value' => ['type' => 'textarea', 'label' => 'Setting Value', 'rules' => 'nullable'],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resource UI Settings
    |--------------------------------------------------------------------------
    |
    | Configure the appearance and behavior of resource forms and lists.
    |
    */
    'resource_ui' => [
        'show_global_errors' => env('TYRO_SHOW_GLOBAL_ERRORS', true),
        'show_field_errors' => env('TYRO_SHOW_FIELD_ERRORS', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Disable Examples
    |--------------------------------------------------------------------------
    |
    | If this is true, the "Examples" section in the sidebar will be hidden
    | and the example routes will be disabled.
    |
    */
    'disable_examples' => env('TYRO_DASHBOARD_DISABLE_EXAMPLES', false),

    /*
    |--------------------------------------------------------------------------
    | Log Viewer
    |--------------------------------------------------------------------------
    |
    | Configure the admin log viewer for application log files in storage/logs.
    |
    */
    'log_viewer' => [
        'max_read_bytes' => env('TYRO_DASHBOARD_LOG_MAX_READ_BYTES', 16777216), // tail cap: 16MB
        'per_page' => 25,
    ],

    /*
    |--------------------------------------------------------------------------
    | Media
    |--------------------------------------------------------------------------
    |
    | Configure media library API keys for external image import providers.
    |
    */
    'media' => [
        'max_size' => env('TYRO_DASHBOARD_MEDIA_MAX_SIZE', 10240),
        'gallery_columns' => (int) env('TYRO_DASHBOARD_MEDIA_GALLERY_COLUMNS', 6),
        'api_keys' => [
            'freepik' => env('TYRO_DASHBOARD_FREEPIK_KEY'),
            'pexels' => env('TYRO_DASHBOARD_PEXELS_KEY'),
            'unsplash' => env('TYRO_DASHBOARD_UNSPLASH_ACCESS_KEY'),
            'pixabay' => env('TYRO_DASHBOARD_PIXABAY_KEY'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Markdown Editor
    |--------------------------------------------------------------------------
    |
    | Configure the assets used by the `<x-tyro-dashboard-editor>` component
    | (EasyMDE). Override these URLs to point at pinned or self-hosted copies.
    |
    */
    'editor' => [
        'css_url' => env('TYRO_DASHBOARD_EDITOR_CSS', 'https://cdn.jsdelivr.net/npm/easymde@2.20.0/dist/easymde.min.css'),
        'js_url' => env('TYRO_DASHBOARD_EDITOR_JS', 'https://cdn.jsdelivr.net/npm/easymde@2.20.0/dist/easymde.min.js'),
    ],
];
