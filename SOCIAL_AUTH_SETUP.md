# Social Authentication & OTP Email Verification Setup Guide

## Overview
This guide explains how to complete the social authentication (Google, Facebook, Instagram) and email OTP verification implementation for the Isan Ekiti website.

## What's Already Done ✅

1. **Laravel Socialite Package** - Installed
2. **Database Migration** - Added fields to users table:
   - `provider` (google, facebook, instagram)
   - `provider_id` (unique ID from social provider)
   - `provider_token` (access token)
   - `otp_code` (6-digit OTP)
   - `otp_expires_at` (OTP expiration timestamp)
   - `is_email_verified` (email verification status)
3. **Services Configuration** - Added configurations for Google, Facebook, Instagram in `config/services.php`

## Required Setup

### 1. Get Social Provider API Keys

#### Google OAuth
1. Go to [Google Cloud Console](https://console.cloud.google.com/)
2. Create a new project or select existing
3. Enable Google+ API
4. Go to Credentials → Create Credentials → OAuth 2.0 Client ID
5. Set redirect URI: `http://localhost:8000/auth/google/callback`
6. Copy Client ID and Client Secret

#### Facebook OAuth
1. Go to [Facebook Developers](https://developers.facebook.com/)
2. Create a new app
3. Add Facebook Login product
4. Set redirect URI: `http://localhost:8000/auth/facebook/callback`
5. Copy App ID and App Secret

#### Instagram OAuth (Note: Instagram uses Facebook)
1. Instagram now requires Facebook Business account
2. Use Facebook API with Instagram Basic Display
3. Set redirect URI: `http://localhost:8000/auth/instagram/callback`
4. Copy Client ID and Client Secret

### 2. Add to .env File

```env
# Google OAuth
GOOGLE_CLIENT_ID=your_google_client_id
GOOGLE_CLIENT_SECRET=your_google_client_secret

# Facebook OAuth
FACEBOOK_CLIENT_ID=your_facebook_app_id
FACEBOOK_CLIENT_SECRET=your_facebook_app_secret

# Instagram OAuth
INSTAGRAM_CLIENT_ID=your_instagram_client_id
INSTAGRAM_CLIENT_SECRET=your_instagram_client_secret

# Mail Configuration for OTP (Example using Mailtrap for testing)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@isanekiti.com
MAIL_FROM_NAME="Isan Ekiti"
```

### 3. Implementation Steps

The following files need to be created/updated:

#### A. SocialAuthController
Location: `app/Http/Controllers/SocialAuthController.php`

Methods needed:
- `redirectToProvider($provider)` - Redirect to social provider
- `handleProviderCallback($provider)` - Handle callback from social provider
- Create or login user with social account

#### B. OTP Verification System

1. **OTP Mail Class**
   - Create: `php artisan make:mail OTPMail`
   - Location: `app/Mail/OTPMail.php`

2. **OTP Controller Methods**
   - `sendOTP()` - Generate and send OTP to user email
   - `verifyOTP()` - Verify OTP code
   - `resendOTP()` - Resend OTP if expired

#### C. Routes
Add to `routes/web.php`:

```php
// Social Authentication Routes
Route::get('/auth/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback'])->name('social.callback');

// OTP Verification Routes
Route::post('/verify-otp', [Auth\RegisteredUserController::class, 'verifyOTP'])->name('otp.verify');
Route::post('/resend-otp', [Auth\RegisteredUserController::class, 'resendOTP'])->name('otp.resend');
```

#### D. Update Login/Register Views

**Login Page** (`resources/views/auth/login.blade.php`):
- Add social login buttons for Google, Facebook, Instagram
- Style with brand colors
- Add "OR" divider between social and email login

**Register Page** (`resources/views/auth/register.blade.php`):
- Add social register buttons
- Add OTP verification step after registration

**OTP Verification Page** (`resources/views/auth/verify-otp.blade.php`):
- Create new view for OTP input
- 6-digit OTP input field
- Resend OTP button
- Timer showing OTP expiration

### 4. User Model Updates

Update `app/Models/User.php`:

```php
protected $fillable = [
    'name',
    'email',
    'password',
    'provider',
    'provider_id',
    'provider_token',
    'otp_code',
    'otp_expires_at',
    'is_email_verified',
    // ... other fields
];

protected $hidden = [
    'password',
    'remember_token',
    'otp_code', // Hide OTP from API responses
    'provider_token',
];

protected $casts = [
    'email_verified_at' => 'datetime',
    'otp_expires_at' => 'datetime',
    'is_email_verified' => 'boolean',
    'password' => 'hashed',
];
```

### 5. Security Considerations

1. **OTP Generation**: Use 6-digit random number
2. **OTP Expiration**: Set expiration time (e.g., 10 minutes)
3. **Rate Limiting**: Limit OTP requests to prevent spam
4. **Password for Social Users**: Make password optional if registered via social
5. **Email Uniqueness**: Ensure email from social provider doesn't conflict with existing accounts

### 6. Testing Flow

#### Social Login Flow:
1. User clicks "Login with Google/Facebook/Instagram"
2. Redirected to provider login page
3. User authorizes app
4. Callback receives user data
5. Check if user exists by email
6. If exists: Login
7. If not: Create new user account
8. Redirect to dashboard

#### Email OTP Flow:
1. User registers with email/password
2. OTP generated and sent to email
3. User redirected to OTP verification page
4. User enters 6-digit OTP
5. System verifies OTP and expiration
6. If valid: Mark email as verified, login user
7. If invalid: Show error, allow resend

### 7. Production Considerations

For production deployment:
1. Update redirect URIs to production domain
2. Use secure HTTPS connections
3. Configure proper email service (SendGrid, Mailgun, AWS SES)
4. Enable rate limiting
5. Add CAPTCHA to prevent bot registrations
6. Implement session security
7. Add logging for authentication events

### 8. Next Steps After Setup

1. Get API keys from all social providers
2. Add keys to `.env` file
3. Implement SocialAuthController methods
4. Create OTP email template
5. Update authentication views with social buttons
6. Create OTP verification page
7. Test complete registration and login flows
8. Add error handling and user feedback messages

## Quick Start Command Summary

```bash
# Create OTP Mail class
php artisan make:mail OTPMail

# Create migration for OTP table (if needed)
php artisan make:migration create_otps_table

# Clear config cache after adding env variables
php artisan config:clear

# Test email configuration
php artisan tinker
Mail::raw('Test email', function($message) {
    $message->to('test@example.com')->subject('Test');
});
```

## Support Resources

- [Laravel Socialite Documentation](https://laravel.com/docs/11.x/socialite)
- [Google OAuth Setup Guide](https://support.google.com/cloud/answer/6158849)
- [Facebook Login Documentation](https://developers.facebook.com/docs/facebook-login/)
- [Laravel Mail Documentation](https://laravel.com/docs/11.x/mail)

---

**Note**: The basic structure is in place. The main work remaining is:
1. Getting API credentials from social providers
2. Implementing the controller methods
3. Creating the email templates
4. Updating the views with social login buttons
5. Creating the OTP verification page

This is a significant feature that requires external API setup. For development, you can start with just Google OAuth as it's the easiest to set up, then add Facebook and Instagram later.
