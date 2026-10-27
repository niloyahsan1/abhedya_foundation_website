@php
    $portalDomain = config('app.portal_domain');
    $host = request()->getHost();
    $isAdminPortal = $isAdminPortal ?? (
        ($portalDomain && $host === $portalDomain) 
        || str_starts_with($host, 'portal.') 
        || request()->boolean('admin') 
        || request()->is('admin/*')
    );
@endphp
@extends($isAdminPortal ? 'tyro-login::layouts.auth' : 'layouts.app')

@if(!$isAdminPortal)
@section('title', __('Sign In') . ' | ' . __('Abhedya Foundation'))
@section('meta_description', __('Sign in to access your Abhedya Foundation account.'))
@endif

@section('content')
@if($isAdminPortal)
{{-- =========================================================================
     ADMIN / STAFF PORTAL LOGIN (Clean Default Laravel / Tyro Auth UI)
     Rendered on portal subdomain: portal.abhedyafoundation.org/login
     ========================================================================= --}}
<div class="auth-container centered" style="min-height:100vh;display:flex;align-items:center;justify-content:center;padding:1.5rem;background:var(--background);">
    <div class="form-panel" style="width:100%;max-width:440px;">
        <div class="form-card" style="background:var(--card, var(--background));border:1px solid var(--border);border-radius:14px;box-shadow:0 10px 25px -5px rgba(0,0,0,0.06), 0 8px 10px -6px rgba(0,0,0,0.04);padding:2.25rem 2rem;">
            
            <!-- Logo -->
            <div class="logo-container" style="text-align:center;margin-bottom:1.5rem;">
                <a href="{{ config('app.url', '/') }}" title="Abhedya Foundation" style="display:inline-block;text-decoration:none;">
                    <img src="{{ asset('images/website_logo.png') }}" alt="Abhedya Foundation" style="height:48px;width:auto;max-width:180px;object-fit:contain;margin:0 auto;display:block;" />
                </a>
            </div>

            <!-- Header -->
            <div class="form-header" style="text-align:center;margin-bottom:1.75rem;">
                <h2 style="font-size:1.45rem;font-weight:700;letter-spacing:-0.02em;color:var(--foreground);margin:0 0 0.35rem 0;">{{ __('Staff Portal') }}</h2>
                <p style="font-size:0.875rem;color:var(--muted-foreground);margin:0;">{{ __('Sign in with your administrative credentials') }}</p>
            </div>

            <!-- Success Alert -->
            @if(session('success'))
            <div class="alert alert-success" style="padding:0.75rem 1rem;margin-bottom:1.25rem;background-color:#d1fae5;border:1px solid #6ee7b7;border-radius:8px;color:#065f46;font-size:0.875rem;">
                {{ session('success') }}
            </div>
            @endif

            <!-- Error Alert -->
            @if(isset($errors) && $errors->any())
            <div class="alert alert-error" style="padding:0.75rem 1rem;margin-bottom:1.25rem;background-color:#fef2f2;border:1px solid #fca5a5;border-radius:8px;color:#991b1b;font-size:0.875rem;">
                {{ $errors->first() }}
            </div>
            @endif

            <!-- Admin Login Form -->
            <form method="POST" action="{{ route('tyro-login.login.submit') }}" style="display:flex;flex-direction:column;gap:1.15rem;">
                @csrf

                <!-- Email Field -->
                <div class="form-group" style="display:flex;flex-direction:column;gap:0.375rem;">
                    <label for="admin_email" class="form-label" style="font-size:0.8125rem;font-weight:600;color:var(--foreground);">
                        {{ __('Email Address') }} <span style="color:#ef4444;">*</span>
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        id="admin_email" 
                        required 
                        autofocus
                        value="{{ old('email') }}" 
                        placeholder="admin@abhedyafoundation.org" 
                        class="form-input"
                        style="width:100%;box-sizing:border-box;padding:0.625rem 0.875rem;font-size:0.875rem;border-radius:8px;border:1px solid var(--border);background:var(--background);color:var(--foreground);outline:none;transition:border-color 0.15s, box-shadow 0.15s;"
                    >
                </div>

                <!-- Password Field with Embedded Eye Toggle -->
                <div class="form-group" style="display:flex;flex-direction:column;gap:0.375rem;">
                    <label for="admin_password" class="form-label" style="font-size:0.8125rem;font-weight:600;color:var(--foreground);">
                        {{ __('Password') }} <span style="color:#ef4444;">*</span>
                    </label>
                    <div style="position:relative;display:flex;align-items:center;width:100%;">
                        <input 
                            type="password" 
                            id="admin_password" 
                            name="password" 
                            required 
                            placeholder="{{ __('Enter password') }}" 
                            class="form-input"
                            style="width:100%;box-sizing:border-box;padding:0.625rem 2.65rem 0.625rem 0.875rem;font-size:0.875rem;border-radius:8px;border:1px solid var(--border);background:var(--background);color:var(--foreground);outline:none;transition:border-color 0.15s, box-shadow 0.15s;"
                        >
                        <button 
                            type="button" 
                            id="adminTogglePwdBtn" 
                            tabindex="-1"
                            aria-label="Toggle password visibility"
                            style="position:absolute;right:0.5rem;background:none;border:none;color:var(--muted-foreground);cursor:pointer;padding:0.35rem;display:flex;align-items:center;justify-content:center;border-radius:6px;"
                        >
                            <svg id="adminEyeOpen" style="width:18px;height:18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <svg id="adminEyeClosed" style="width:18px;height:18px;display:none;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div style="display:flex;align-items:center;justify-content:space-between;padding-top:0.25rem;">
                    <label style="display:inline-flex;align-items:center;gap:0.5rem;font-size:0.8125rem;color:var(--muted-foreground);cursor:pointer;user-select:none;">
                        <input type="checkbox" id="admin_remember" name="remember" {{ old('remember') ? 'checked' : '' }} style="width:15px;height:15px;border-radius:4px;accent-color:var(--primary);cursor:pointer;">
                        <span>{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary" style="width:100%;box-sizing:border-box;padding:0.6875rem 1rem;font-size:0.875rem;font-weight:600;color:var(--primary-foreground);background:var(--primary);border:none;border-radius:8px;cursor:pointer;transition:all 0.15s ease-in-out;margin-top:0.25rem;">
                    {{ __('Sign in to Portal') }}
                </button>
            </form>

            <!-- Back Link -->
            <div style="margin-top:1.5rem;padding-top:1.25rem;border-top:1px solid var(--border);text-align:center;">
                <a href="{{ config('app.url', '/') }}" style="font-size:0.8125rem;color:var(--muted-foreground);text-decoration:none;font-weight:500;transition:color 0.15s ease;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--muted-foreground)'">
                    &larr; {{ __('Return to main website') }}
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var pwd = document.getElementById('admin_password');
        var btn = document.getElementById('adminTogglePwdBtn');
        var openIcon = document.getElementById('adminEyeOpen');
        var closedIcon = document.getElementById('adminEyeClosed');

        if (btn && pwd && openIcon && closedIcon) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                var isMasked = pwd.getAttribute('type') === 'password';
                pwd.setAttribute('type', isMasked ? 'text' : 'password');
                if (isMasked) {
                    openIcon.style.display = 'none';
                    closedIcon.style.display = 'block';
                    btn.setAttribute('aria-label', 'Hide password');
                } else {
                    openIcon.style.display = 'block';
                    closedIcon.style.display = 'none';
                    btn.setAttribute('aria-label', 'Show password');
                }
            });
        }
    });
</script>

@else
{{-- =========================================================================
     USER / MEMBER LOGIN (Website Theme Layout, Strictly NO Registration)
     Rendered on main domain: abhedyafoundation.org/login
     ========================================================================= --}}
<div class="site-login-section">
    <div class="site-login-card">
        
        <!-- Brand Header -->
        <div class="site-login-header">
            <a href="{{ route('home') }}" class="site-login-logo-link" title="Abhedya Foundation">
                <img src="{{ asset('images/website_logo.png') }}" alt="Abhedya Foundation" class="site-login-logo" />
            </a>
            <h1 class="site-login-title">{{ __('Abhedya Foundation') }}</h1>
            <p class="site-login-subtitle">{{ __('Member Sign In') }}</p>
        </div>

        <!-- Success Alert -->
        @if(session('success'))
        <div class="site-login-alert alert-success">
            <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        <!-- Error Alert -->
        @if(isset($errors) && $errors->any())
        <div class="site-login-alert alert-danger">
            <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>{{ $errors->first() }}</span>
        </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('tyro-login.login.submit') }}" class="site-login-form">
            @csrf

            <!-- Email Field -->
            <div class="site-field-group">
                <label for="email" class="site-field-label">
                    {{ __('Email Address') }} <span class="required-star">*</span>
                </label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    required 
                    autofocus
                    value="{{ old('email') }}" 
                    placeholder="example@gmail.com" 
                    class="site-field-input @error('email') has-error @enderror"
                >
            </div>

            <!-- Password Field with Embedded Eye Toggle -->
            <div class="site-field-group">
                <label for="password" class="site-field-label">
                    {{ __('Password') }} <span class="required-star">*</span>
                </label>
                <div class="password-wrapper">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        placeholder="{{ __('Enter your password') }}" 
                        class="site-field-input password-input @error('password') has-error @enderror"
                    >
                    <button 
                        type="button" 
                        id="togglePasswordBtn" 
                        class="password-eye-btn" 
                        tabindex="-1"
                        aria-label="Toggle password visibility"
                    >
                        <!-- Eye Open Icon (default masked state) -->
                        <svg id="eyeOpenIcon" class="eye-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <!-- Eye Slashed Icon (shown when unmasked) -->
                        <svg id="eyeClosedIcon" class="eye-svg is-hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="site-remember-row">
                <label class="site-remember-label">
                    <input type="checkbox" id="remember" name="remember" class="site-remember-checkbox" {{ old('remember') ? 'checked' : '' }}>
                    <span>{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Notice: No Public Registration -->
            <div class="site-auth-notice">
                <svg class="notice-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{ __('Member accounts are provisioned by administration. Public registration is not available.') }}</span>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="site-submit-btn">
                {{ __('Sign In') }}
            </button>
        </form>

        <!-- Back Link -->
        <div class="site-login-footer">
            <a href="{{ route('home') }}" class="site-back-link">
                &larr; {{ __('Back to website') }}
            </a>
        </div>
    </div>
</div>

<style>
    /* ========================================================
       ABHEDYA FOUNDATION DEDICATED USER LOGIN STYLES
       Seamlessly inherits site colors, fonts, and layout
       ======================================================== */
    .site-login-section {
        min-height: calc(100vh - 350px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3.5rem 1.25rem;
        background-color: #f8fafc;
    }

    .site-login-card {
        width: 100%;
        max-width: 420px;
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.05), 0 8px 10px -6px rgba(15, 23, 42, 0.03);
        padding: 2.25rem 2rem 1.75rem;
        box-sizing: border-box;
    }

    .site-login-header {
        text-align: center;
        margin-bottom: 1.75rem;
    }

    .site-login-logo-link {
        display: inline-block;
        margin-bottom: 0.75rem;
        text-decoration: none;
    }

    .site-login-logo {
        height: 48px;
        width: auto;
        max-width: 180px;
        object-fit: contain;
        display: block;
        margin: 0 auto;
    }

    .site-login-title {
        font-size: 1.375rem;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 0.25rem 0;
        letter-spacing: -0.02em;
        line-height: 1.25;
    }

    .site-login-subtitle {
        font-size: 0.875rem;
        color: #64748b;
        margin: 0;
        font-weight: 500;
    }

    /* Alerts */
    .site-login-alert {
        display: flex;
        align-items: center;
        gap: 0.625rem;
        padding: 0.75rem 0.875rem;
        border-radius: 10px;
        font-size: 0.8125rem;
        line-height: 1.4;
        margin-bottom: 1.25rem;
    }

    .site-login-alert .alert-icon {
        width: 18px;
        height: 18px;
        flex-shrink: 0;
    }

    .alert-danger {
        background-color: #fef2f2;
        border: 1px solid #fecaca;
        color: #b91c1c;
    }

    .alert-success {
        background-color: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #15803d;
    }

    /* Form Fields */
    .site-login-form {
        display: flex;
        flex-direction: column;
        gap: 1.125rem;
    }

    .site-field-group {
        display: flex;
        flex-direction: column;
        gap: 0.375rem;
        text-align: left;
    }

    .site-field-label {
        font-size: 0.75rem;
        font-weight: 700;
        color: #334155;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .required-star {
        color: #ef4444;
    }

    .site-field-input {
        width: 100%;
        box-sizing: border-box;
        padding: 0.6875rem 0.875rem;
        font-size: 0.875rem;
        color: #0f172a;
        background-color: #f8fafc;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        transition: all 0.15s ease-in-out;
        outline: none !important;
    }

    .site-field-input:hover {
        border-color: #94a3b8;
    }

    .site-field-input:focus {
        background-color: #ffffff;
        border-color: #2375b8;
        box-shadow: 0 0 0 3px rgba(35, 117, 184, 0.15);
    }

    .site-field-input.has-error {
        border-color: #ef4444;
        background-color: #fff5f5;
    }

    /* Embedded Password Visibility Toggle */
    .password-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        width: 100%;
    }

    .password-wrapper .password-input {
        padding-right: 2.75rem !important;
    }

    .password-eye-btn {
        position: absolute;
        right: 0.625rem;
        top: 50%;
        transform: translateY(-50%);
        background: transparent;
        border: none;
        padding: 0.375rem;
        color: #94a3b8;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        transition: color 0.15s ease, background-color 0.15s ease;
        outline: none !important;
    }

    .password-eye-btn:hover {
        color: #2375b8;
        background-color: #f1f5f9;
    }

    .password-eye-btn .eye-svg {
        width: 18px;
        height: 18px;
        display: block;
    }

    .password-eye-btn .eye-svg.is-hidden {
        display: none !important;
    }

    /* Remember Row */
    .site-remember-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 0.125rem;
    }

    .site-remember-label {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.8125rem;
        color: #475569;
        cursor: pointer;
        user-select: none;
    }

    .site-remember-checkbox {
        width: 16px;
        height: 16px;
        accent-color: #2375b8;
        cursor: pointer;
        border-radius: 4px;
    }

    /* Notice Box */
    .site-auth-notice {
        display: flex;
        align-items: flex-start;
        gap: 0.5rem;
        padding: 0.625rem 0.75rem;
        background-color: #f1f5f9;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 0.75rem;
        color: #64748b;
        line-height: 1.4;
    }

    .site-auth-notice .notice-icon {
        width: 16px;
        height: 16px;
        flex-shrink: 0;
        color: #94a3b8;
        margin-top: 1px;
    }

    /* Submit Button */
    .site-submit-btn {
        width: 100%;
        box-sizing: border-box;
        padding: 0.75rem 1rem;
        font-size: 0.875rem;
        font-weight: 700;
        color: #ffffff;
        background-color: #1771bf;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        box-shadow: 0 4px 6px -1px rgba(23, 113, 191, 0.25);
        transition: all 0.15s ease-in-out;
        margin-top: 0.25rem;
    }

    .site-submit-btn:hover {
        background-color: #1565a8;
        box-shadow: 0 6px 12px -2px rgba(23, 113, 191, 0.3);
        transform: translateY(-1px);
    }

    .site-submit-btn:active {
        transform: translateY(0);
    }

    /* Footer Back Link */
    .site-login-footer {
        margin-top: 1.5rem;
        padding-top: 1.125rem;
        border-top: 1px solid #f1f5f9;
        text-align: center;
    }

    .site-back-link {
        font-size: 0.8125rem;
        font-weight: 600;
        color: #64748b;
        text-decoration: none;
        transition: color 0.15s ease;
    }

    .site-back-link:hover {
        color: #2375b8;
        text-decoration: underline;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var pwd = document.getElementById('password');
        var btn = document.getElementById('togglePasswordBtn');
        var openIcon = document.getElementById('eyeOpenIcon');
        var closedIcon = document.getElementById('eyeClosedIcon');

        if (btn && pwd && openIcon && closedIcon) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                var isMasked = pwd.getAttribute('type') === 'password';
                pwd.setAttribute('type', isMasked ? 'text' : 'password');

                if (isMasked) {
                    openIcon.classList.add('is-hidden');
                    closedIcon.classList.remove('is-hidden');
                    btn.setAttribute('aria-label', 'Hide password');
                } else {
                    openIcon.classList.remove('is-hidden');
                    closedIcon.classList.add('is-hidden');
                    btn.setAttribute('aria-label', 'Show password');
                }
            });
        }
    });
</script>
@endif
@endsection
