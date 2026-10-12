# PROJECT: ABHEDYA FOUNDATION — PRODUCTION-READY WEBSITE

Act as a senior full-stack developer, Laravel architect, UI/UX designer, database designer, and application security engineer.

Your task is to design and develop a complete, production-ready website for Abhedya Foundation, a foundation that publishes information about its projects, activities, fundraising campaigns, news, and donations.

This is a real client project. Do not treat it as a demo, tutorial, portfolio project, or coding competition.

Build a maintainable, secure, responsive application that can be deployed to a suitable production hosting environment.

**Website domain:** https://abhedyafoundation.org

## 1. TECHNOLOGY STACK

Use the following technologies:

- Backend: PHP with Laravel
- Database: MySQL
- Admin dashboard: Tyro Dashboard
- Frontend: Laravel Blade
- Styling: Tailwind CSS
- JavaScript: Alpine.js where necessary
- Authentication and authorization: Tyro Dashboard's supported authentication and role-based access control (RBAC) functionality
- Image handling: Laravel filesystem with local or compatible production storage
- Build tools: Composer and Vite
- Testing: PHPUnit or Pest, following the project's existing setup

Use stable, mutually compatible releases. Before installing dependencies, verify the compatibility requirements for PHP, Laravel, Tyro Dashboard, Composer, Node.js, and all related packages.

**Important Tyro Dashboard requirements:**

- Inspect Tyro Dashboard's official documentation and the installed package version before implementation.
- Use Tyro's existing authentication, login, user management, roles, privileges, and authorization features wherever supported.
- Do not create a duplicate authentication system if Tyro already provides the required functionality.
- Configure administrator accounts, roles, and permissions correctly.
- Protect all administrative routes, resources, actions, and sensitive records with server-side authorization.
- Verify that Tyro's features are compatible with the selected Laravel version and intended hosting environment.
- If a requirement is not supported natively by Tyro, implement the smallest secure Laravel-native extension necessary.
- Do not assume that installing Tyro automatically configures every required permission or protects every custom resource.

Do not introduce React, Next.js, Node.js/Express as a separate backend, MongoDB, Supabase, or Cloudflare unless a specific requirement justifies the additional complexity.

Use Laravel conventions rather than building unnecessary custom infrastructure.

## 2. WEBSITE PAGES

Create the following public-facing pages.

### Home

- Professional hero section
- Foundation introduction
- Mission and vision
- Featured projects
- Active fundraising campaigns
- Latest news and blog posts
- Impact statistics
- Donation call to action
- Photo gallery preview
- Contact information
- Footer with social media links

### About Us

- Foundation background
- Mission and vision
- Goals and objectives
- Organizational information
- Team section, if information is available

### Projects & Activities

- Display published projects
- Project cards with images, summaries, and dates
- Individual project detail pages
- Project status and activity updates

### Campaigns

- Display active and completed campaigns
- Fundraising goals
- Verified amounts raised
- Progress indicators
- Campaign descriptions and updates
- Individual campaign detail pages
- Donation instructions associated with each campaign

### Blog & News

- Blog listing
- Featured articles
- Categories and tags where useful
- Publication dates
- Featured images
- Individual article detail pages
- Pagination
- Search functionality if appropriate

### Photo Gallery

- Responsive image grid
- Captions and optional album categories
- Optimized images
- Accessible image presentation

### Donation

- bKash donation instructions and QR code
- Nagad donation instructions
- Rocket donation instructions
- Bank transfer instructions
- Donation verification information
- Clear instructions for donors

Do not invent actual payment numbers, bank details, foundation registration information, or other organizational facts. Use clearly marked placeholders until the client supplies verified information.

Do not claim that a donation has been received or verified merely because a visitor submits a form.

### Contact Us

- Contact form
- Foundation email and telephone details when provided
- Address when provided
- Social media links
- Form validation and spam protection

### Admin Dashboard

Implement the administrative interface through Tyro Dashboard.

Use a dedicated route such as `/admin`, following Tyro's routing and installation conventions.

The admin panel must require authentication and enforce authorization for every protected resource and action. Do not expose administrative functionality to public visitors.

## 3. ADMIN DASHBOARD REQUIREMENTS

Use Tyro Dashboard's supported dashboard, authentication, user management, RBAC, CRUD, audit, and media-management capabilities where applicable.

Create management interfaces for:

1. Blog posts
2. Project records
3. Fundraising campaigns
4. Campaign updates
5. Gallery images and albums
6. Donation records, if manual donation tracking is enabled
7. Contact messages
8. Categories and tags, where applicable
9. Site settings and social media links
10. Authorized administrator accounts

Administrators must be able to create, view, edit, publish, unpublish, and delete content according to their assigned permissions.

Support draft and published states for blog posts, projects, and campaigns.

Provide image upload fields with appropriate file validation and storage configuration.

Use pagination, search, filters, sorting, and clear validation messages where useful.

Configure role-based permissions, using the capabilities Tyro supports, for actions such as:

- Managing administrators and their permissions
- Creating and editing content
- Publishing and unpublishing content
- Managing campaigns and campaign updates
- Verifying or rejecting donation records
- Viewing contact messages
- Updating site settings
- Deleting records

Use the principle of least privilege. A content editor must not automatically receive permission to manage administrator accounts, alter security settings, or verify donations unless explicitly authorized.

Use Tyro's supported audit functionality for important administrative actions where available. If critical actions are not covered, implement appropriate additional audit logging.

Do not expose private administrator information or sensitive records to public visitors.

Do not assume a feature exists merely because it is listed as a general Tyro capability. Verify its availability in the installed version and document any necessary extensions.

## 4. AUTHENTICATION AND AUTHORIZATION

Tyro Dashboard is the primary administrative authentication and authorization solution.

Implement the following requirements:

- Use Tyro's supported login and authentication mechanisms.
- Configure secure administrator authentication and session handling.
- Ensure only authenticated, authorized administrators can access the dashboard.
- Configure roles and privileges using Tyro's supported RBAC functionality.
- Apply authorization checks to custom routes, controllers, models, resources, and actions.
- Prevent unauthorized users from viewing, editing, deleting, publishing, or verifying protected records.
- Disable public administrator registration unless explicitly required by the foundation.
- Provide a secure, documented process for creating the initial administrator account.
- Protect account management and permission changes from unauthorized access.
- Use secure password hashing and any supported password-reset or account-recovery features.
- Follow Laravel's security conventions for sessions, CSRF protection, and request validation.

Do not build a second login system alongside Tyro unless a specific, verified technical limitation makes it necessary.

Do not assume that hiding a menu item or button provides security. Every protected action must be enforced on the server.

Before completion, test both authenticated and unauthenticated access, including attempts by users with insufficient permissions.

## 5. DATABASE DESIGN

Design an appropriate relational MySQL schema.

Consider tables for:

- users and any Tyro-required authentication or authorization tables
- posts
- categories
- tags
- post_tag relationships
- projects
- campaigns
- campaign_updates
- gallery_albums
- gallery_images
- donations
- contact_messages
- site_settings
- audit records, if required

Inspect Tyro's migrations and existing schema before creating authentication, role, privilege, audit, or other tables. Reuse Tyro's existing tables and relationships where appropriate. Do not create duplicate user or RBAC tables.

Adjust this schema when justified by the implementation. Avoid creating unnecessary tables.

Use:

- Foreign keys
- Appropriate indexes
- Database constraints
- Laravel migrations
- Eloquent relationships
- Transactions for operations that require atomicity

Store passwords using Laravel's secure password hashing facilities and Tyro's supported authentication implementation.

Use migrations and seeders to establish the schema and provide optional sample content for development.

Do not place production credentials or real personal information in seeders or source control.

Ensure migrations can be run reproducibly in a fresh environment and that deployment instructions account for Tyro's required migrations.

## 6. CAMPAIGN AND DONATION LOGIC

Each campaign should support:

- Title
- Slug
- Description
- Featured image
- Fundraising target
- Start date
- End date, if applicable
- Status
- Published updates

Campaign fundraising totals must not be arbitrarily generated.

If donation tracking is implemented, distinguish between pending, verified, rejected, refunded, or other necessary statuses.

Only verified donations should contribute to the confirmed fundraising total.

Use consistent business rules to prevent duplicate counting. Ensure only authorized users can verify, reject, or refund records where applicable.

For the initial release, donations may be handled through manual payment instructions and administrator-verified records.

Do not integrate a payment gateway unless the foundation has the required merchant arrangements and credentials.

Never collect payment PINs, OTPs, passwords, or other payment authentication secrets.

Do not represent manually entered or unverified amounts as confirmed fundraising results.

## 7. DESIGN AND USER EXPERIENCE

Create a polished, modern, trustworthy nonprofit foundation website.

The design should feel professional, welcoming, accessible, and credible.

Requirements:

- Mobile-first responsive layout
- Consistent typography and spacing
- Clear visual hierarchy
- Professional navigation
- Accessible color contrast
- Reusable Blade components
- Responsive project and campaign cards
- Attractive but restrained animations
- Loading, empty, success, and error states where appropriate
- Accessible forms and keyboard navigation

Do not use excessive animations, unnecessary gradients, or generic dashboard templates for the public website.

Use authentic foundation content only when supplied. Otherwise, create clearly identifiable placeholder content.

Keep the public website visually distinct from the admin interface. Use Tyro's supported dashboard layout and customization mechanisms without unnecessarily replacing its core functionality.

## 8. SEO REQUIREMENTS

Implement:

- Page-specific titles and meta descriptions
- Canonical URLs
- Semantic HTML
- Appropriate heading hierarchy
- Open Graph metadata
- XML sitemap
- `robots.txt`
- Clean, readable URLs
- Image alt text
- Appropriate structured data where justified
- Pagination metadata and indexing rules where appropriate

Ensure published content can be indexed by search engines.

Do not index private admin pages, drafts, or sensitive content. Use appropriate authentication and access controls as the primary protection for private resources; `robots.txt` alone is not a security mechanism.

## 9. SECURITY REQUIREMENTS

Follow Laravel security best practices and Tyro's documented security guidance.

Implement:

- Tyro-supported authentication for administrative access
- Role-based authorization and server-side permission checks
- CSRF protection
- Server-side validation
- Output escaping
- Protection against mass assignment
- Secure file upload validation
- Rate limiting for sensitive endpoints and forms
- Secure session and cookie configuration
- HTTPS in production
- Safe error handling
- Protection against unauthorized record modification
- Secure handling of environment variables and credentials
- Appropriate logging and audit trails for sensitive administrative actions

Do not rely on frontend validation alone.

Do not expose database credentials or application secrets.

Do not create public administrator registration unless explicitly required.

The public must not be able to modify campaign totals, create administrator accounts, change permissions, or access private records.

Validate uploads by permitted file types, content, size, and storage rules. Prevent uploaded files from being executed as application code.

Do not return sensitive data in error messages, logs, API responses, or public pages.

## 10. PERFORMANCE AND MAINTAINABILITY

Implement:

- Eager loading to avoid N+1 queries
- Database indexes where appropriate
- Image optimization
- Pagination for large collections
- Caching where appropriate
- Reusable components and services
- Clear separation of responsibilities
- Consistent naming conventions
- Useful logging without leaking sensitive data

Avoid unnecessary abstractions and dependencies.

Keep public page queries efficient and make sure caches are invalidated when published content or relevant settings change.

Use queues only where appropriate and document any worker requirements before relying on them in production.

## 11. TESTING

Create tests for critical functionality, including:

- Public page accessibility
- Tyro authentication integration
- Unauthenticated admin access
- Authorization and role restrictions
- Unauthorized CRUD attempts
- Administrator and permission management
- CRUD operations for managed content
- Draft and published content visibility
- File upload validation
- Campaign progress calculations
- Donation verification rules
- Duplicate donation handling
- Contact form validation and spam protection
- SEO metadata where practical

Test access boundaries explicitly. Verify that users without the required permissions cannot access protected URLs or execute protected actions by submitting direct HTTP requests.

Run the available automated tests and fix failures before declaring the implementation complete.

Do not claim that tests pass unless they have actually been executed successfully.

## 12. PRODUCTION DEPLOYMENT

The intended deployment environment is traditional hosting that supports Laravel and MySQL, such as a compatible cPanel plan or VPS.

Prepare the application for production deployment.

Include:

- `.env.example` without real secrets
- Database migrations
- Production-safe configuration
- Tyro Dashboard installation and configuration requirements
- Storage configuration
- Required filesystem permissions
- Build instructions
- Deployment instructions
- HTTPS requirements
- Database backup recommendations
- Cache and optimization commands
- Queue and scheduler requirements, if actually used

Verify the hosting environment supports the selected PHP version, required extensions, Composer dependencies, database version, and frontend build workflow.

Never commit `.env` or production credentials.

Never expose the Laravel application source, environment file, or private storage through the public web root.

For cPanel deployment, explain how to configure the document root to serve Laravel's `public` directory safely. If the hosting provider cannot configure this directly, document a safe alternative.

Do not assume that every cPanel plan supports the same PHP version, extensions, cron jobs, shell access, or other features. Document the required capabilities and verify them before deployment.

Document how to run Tyro's required installation steps, migrations, and initial administrator setup securely. Never hardcode production administrator credentials in source code or seeders.

## 13. DEVELOPMENT WORKFLOW

Before making major changes:

1. Inspect the existing repository and its directory structure.
2. Identify the installed software versions and existing dependencies.
3. Check whether the project already contains working code.
4. Preserve useful existing functionality.
5. Review Tyro Dashboard's official documentation and compatibility requirements.
6. Identify missing requirements and technical risks.
7. Propose a concise implementation plan.

Then implement the application incrementally.

Do not merely generate a project outline, mockup, or static frontend and claim the application is complete.

Build the actual database-backed website and functional Tyro-powered admin dashboard.

Do not leave major features as nonfunctional buttons or hardcoded dashboard statistics.

Do not invent successful test results or claim that deployment has been completed when it has not.

If a required credential, hosting capability, Tyro feature, or business detail is unavailable, implement what can be completed safely and clearly document the remaining requirement.

Do not replace Tyro with Filament or another admin package without a verified technical blocker and an explicit explanation of why Tyro cannot meet the requirement.

Do not ask me to approve every minor implementation detail. Make sensible engineering decisions and explain consequential trade-offs.

## 14. REQUIRED DELIVERABLES

At completion, provide:

1. Working public website
2. Functional Tyro Dashboard admin interface
3. MySQL schema and migrations
4. Content management for posts, projects, campaigns, and gallery images
5. Tyro-based authentication and authorization, correctly configured and tested
6. Role and permission configuration
7. Contact form functionality
8. Donation instructions and appropriate donation record management
9. SEO implementation
10. Automated tests for critical features
11. Installation instructions
12. Production deployment guide
13. Backup and maintenance recommendations
14. Initial administrator setup instructions
15. List of remaining tasks requiring client information or external service credentials

## FINAL INSTRUCTION

Treat this as a real production project.

Prioritize correctness, maintainability, security, and a complete working implementation over speed or unnecessary technological complexity.

Use Tyro Dashboard's existing authentication and authorization functionality wherever it satisfies the requirements. Configure and test it properly rather than building duplicate systems.

Start by inspecting the repository and checking the development environment. Then propose the implementation plan and proceed in manageable stages.

Do not overwrite existing work without understanding it. Do not ask me to approve every minor implementation detail. Make sensible engineering decisions, explain consequential trade-offs, and verify your work.

At the end, provide an honest implementation summary covering what works, what has been tested, how to run the application, how to deploy it, and anything still requiring configuration or client input.