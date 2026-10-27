<?php

namespace App\Http\Controllers\Auth;

use HasinHayder\TyroLogin\Helpers\TwoFactorHelper;
use HasinHayder\TyroLogin\Http\Controllers\LoginController as BaseLoginController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends BaseLoginController
{
    /**
     * Show the login form with guest/admin intelligence.
     */
    public function showLoginForm(Request $request): View|RedirectResponse
    {
        $isPortal = $this->isAdminPortalRequest($request);

        if (Auth::check()) {
            $user = Auth::user();
            $isAdmin = $this->userHasAdminRole($user);

            if ($isPortal) {
                return $isAdmin ? redirect()->to('/dashboard') : redirect()->to('/');
            }

            return $isAdmin ? redirect()->to('/dashboard') : redirect()->to('/');
        }

        return parent::showLoginForm($request);
    }

    /**
     * Handle an incoming login request with strict role-based separation:
     * - Member Login (/login): Accepts ONLY regular users/members. Rejects any admin roles.
     * - Admin Portal (/admin/login or portal.*): Accepts ONLY admins. Rejects regular users.
     */
    public function login(Request $request): RedirectResponse
    {
        // 1. Check if user is locked out
        if ($this->isLockedOut($request)) {
            return redirect()->route('tyro-login.lockout');
        }

        $loginField = config('tyro-login.login_field', 'email');

        // 2. Get validation rules (includes captcha if enabled)
        $rules = $this->getValidationRules($loginField);

        if (config('tyro-login.captcha.enabled_login', false)) {
            $rules['captcha_answer'] = ['required', 'numeric'];
        }

        $credentials = $request->validate($rules);

        // Handle 'both' login field
        if ($loginField === 'both') {
            $loginValue = $credentials['login'];
            $field = filter_var($loginValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            $credentials[$field] = $loginValue;
            unset($credentials['login']);
        }

        // Validate captcha if enabled
        if (config('tyro-login.captcha.enabled_login', false)) {
            if (! $this->validateCaptcha($request, 'login', $credentials['captcha_answer'])) {
                $this->generateCaptcha($request, 'login');

                throw ValidationException::withMessages([
                    'captcha_answer' => config('tyro-login.captcha.error_message', 'Incorrect answer. Please try again.'),
                ]);
            }
            unset($credentials['captcha_answer']);
        }

        $remember = config('tyro-login.features.remember_me', true)
            ? $request->boolean('remember')
            : false;

        unset($credentials['remember']);

        // 3. Attempt authentication
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $this->clearLockout($request);

            $user = Auth::user();

            // Check if user is suspended
            if ($this->isUserSuspended($user)) {
                Auth::logout();

                throw ValidationException::withMessages([
                    'email' => config('tyro-login.suspension.message', 'Your account has been suspended. Please contact support for more information.'),
                ]);
            }

            $isPortal = $this->isAdminPortalRequest($request);
            $hasAdminRole = $this->userHasAdminRole($user);
            $errorField = $loginField === 'both' ? 'login' : $loginField;

            // 4. Strict Enforcement: Member Login MUST reject anyone with admin-related roles
            if (! $isPortal && $hasAdminRole) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                $message = app()->getLocale() === 'bn'
                    ? 'অ্যাডমিন অ্যাকাউন্ট দিয়ে সাধারণ সদস্য লগইন করা যাবে না। অনুগ্রহ করে অ্যাডমিন পোর্টাল ব্যবহার করুন।'
                    : 'Administrator accounts cannot log in through the member portal. Please use the Admin Portal.';

                throw ValidationException::withMessages([
                    $errorField => $message,
                ]);
            }

            // 5. Strict Enforcement: Admin Portal MUST reject anyone without an admin role
            if ($isPortal && ! $hasAdminRole) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                throw ValidationException::withMessages([
                    $errorField => 'Access denied. Only authorized administrators can access the Admin Portal.',
                ]);
            }

            // 6. Check if email verification is required
            if (config('tyro-login.registration.require_email_verification', false) && ! $user->hasVerifiedEmail()) {
                Auth::logout();
                $request->session()->put('tyro-login.verification.email', $user->email);

                return redirect()->route('tyro-login.verification.not-verified');
            }

            // 7. Check if 2FA is enabled
            if (config('tyro-login.two_factor.enabled', false)) {
                if (filled($user->two_factor_confirmed_at)) {
                    Auth::logout();
                    $request->session()->put('login.id', $user->id);
                    $request->session()->put('login.remember', $remember);

                    return redirect()->route('tyro-login.two-factor.challenge');
                } else {
                    if (TwoFactorHelper::userShouldSkipTwoFactorSetup($user)) {
                        $this->setDashboardHeartbeat($user);

                        return $this->authenticatedRedirect($request, $isPortal);
                    }

                    if (config('tyro-login.two_factor.allow_skip', false)
                        && ! TwoFactorHelper::userHasForcedRole($user)
                        && $request->cookie('tyro_2fa_ignore_'.$user->id)) {
                        return $this->authenticatedRedirect($request, $isPortal);
                    }

                    Auth::logout();
                    $request->session()->put('login.id', $user->id);
                    $request->session()->put('login.remember', $remember);

                    return redirect()->route('tyro-login.two-factor.setup');
                }
            }

            // 8. Check if OTP is enabled
            if (config('tyro-login.otp.enabled', false)) {
                $userId = $user->id;
                $rememberPreference = $remember;

                Auth::logout();
                $request->session()->regenerate();

                $request->session()->put('tyro-login.otp.user_id', $userId);
                $request->session()->put('tyro-login.otp.remember', $rememberPreference);

                $this->generateAndSendOtp($request, $user);

                return redirect()->route('tyro-login.otp.verify');
            }

            $this->setDashboardHeartbeat($user);

            return $this->authenticatedRedirect($request, $isPortal);
        }

        // 9. Failed credentials handling
        $this->incrementLockoutAttempts($request);

        if (config('tyro-login.captcha.enabled_login', false)) {
            $this->generateCaptcha($request, 'login');
        }

        if ($this->shouldLockout($request)) {
            $this->lockoutUser($request);

            return redirect()->route('tyro-login.lockout');
        }

        $isBn = app()->getLocale() === 'bn';
        $errorMessage = $isBn
            ? 'প্রদত্ত তথ্যের সাথে আমাদের রেকর্ডের কোনো মিল পাওয়া যায়নি।'
            : __('auth.failed');

        if (config('tyro-login.lockout.enabled', true) && config('tyro-login.lockout.show_attempts_left', false)) {
            $attemptsLeft = $this->getRemainingAttempts($request);
            if ($attemptsLeft > 0) {
                if ($isBn) {
                    $bnAttempts = class_exists(\App\Helpers\BanglaHelper::class)
                        ? \App\Helpers\BanglaHelper::toBnNumber((string) $attemptsLeft)
                        : (string) $attemptsLeft;
                    $errorMessage .= " (আর {$bnAttempts} বার চেষ্টা করা যাবে)";
                } else {
                    $errorMessage .= ' '.trans_choice(
                        '{1} :count attempt remaining.|[2,*] :count attempts remaining.',
                        $attemptsLeft,
                        ['count' => $attemptsLeft]
                    );
                }
            }
        }

        $errorField = $loginField === 'both' ? 'login' : $loginField;

        throw ValidationException::withMessages([
            $errorField => $errorMessage,
        ]);
    }

    /**
     * Log the user out with smart redirect.
     */
    public function logout(Request $request): RedirectResponse
    {
        $referer = (string) $request->headers->get('referer', '');
        $isFromPortal = str_contains($referer, 'portal.') 
            || str_contains($referer, '/admin') 
            || str_contains($referer, '/dashboard');

        parent::logout($request);

        // If member logged out from the public website navbar, stay on website home
        if (! $isFromPortal) {
            return redirect()->route('home')->with('success', app()->getLocale() === 'bn' ? 'সফলভাবে লগআউট সম্পন্ন হয়েছে।' : 'Logged out successfully.');
        }

        return redirect(config('tyro-login.redirects.after_logout', '/admin/login'));
    }

    /**
     * Determine destination URL after successful authentication.
     */
    protected function authenticatedRedirect(Request $request, bool $isPortal): RedirectResponse
    {
        if ($isPortal) {
            return redirect()->intended(config('tyro-login.redirects.after_login', '/dashboard'));
        }

        return redirect()->intended('/');
    }

    /**
     * Determine if the current request is intended for the admin portal.
     */
    protected function isAdminPortalRequest(Request $request): bool
    {
        // 1. Direct admin login route
        if ($request->is('admin/login') || $request->is('admin/*')) {
            return true;
        }

        // 2. Portal domain check (e.g. portal.abhedyafoundation.org)
        $host = $request->getHost();
        $portalDomain = config('app.portal_domain');

        if ($portalDomain && $host === $portalDomain) {
            return true;
        }

        if (str_starts_with($host, 'portal.')) {
            return true;
        }

        // 3. Form explicitly marked as admin portal
        if ($request->input('login_type') === 'admin') {
            return true;
        }

        // 4. Local testing fallback: query param ?admin=1 or referer from /admin/login
        if (empty($portalDomain)) {
            if ($request->boolean('admin')) {
                return true;
            }

            $referer = (string) $request->headers->get('referer', '');
            if (str_contains($referer, '/admin/login') || str_contains($referer, '?admin=1')) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if the given user has any admin-related roles.
     */
    protected function userHasAdminRole($user): bool
    {
        if (! $user) {
            return false;
        }

        if (method_exists($user, 'tyroRoleSlugs')) {
            $userRoles = $user->tyroRoleSlugs();
        } elseif (method_exists($user, 'roles')) {
            $userRoles = $user->roles()->pluck('slug')->all();
        } else {
            $userRoles = [];
        }

        // Wildcard '*' represents super-admin/all access
        if (in_array('*', $userRoles, true)) {
            return true;
        }

        $adminRoles = array_unique(array_merge(
            (array) config('tyro-dashboard.admin_roles', ['admin', 'super-admin']),
            ['admin', 'super-admin', '*']
        ));

        return ! empty(array_intersect($adminRoles, $userRoles));
    }
}
