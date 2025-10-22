<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\OTPMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Generate 6-digit OTP
        $otpCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'otp_code' => $otpCode,
            'otp_expires_at' => Carbon::now()->addMinutes(10),
            'is_email_verified' => false,
        ]);

        event(new Registered($user));

        // Send OTP email
        try {
            Mail::to($user->email)->send(new OTPMail($otpCode, $user->name));
        } catch (\Exception $e) {
            // Log error but don't fail registration
            \Log::error('Failed to send OTP email: ' . $e->getMessage());
        }

        // Store user ID in session for verification
        session(['otp_user_id' => $user->id]);

        return redirect()->route('otp.verify')
            ->with('success', 'Registration successful! Please check your email for the verification code.');
    }

    /**
     * Show OTP verification form
     */
    public function showOTPVerification(): View
    {
        if (!session('otp_user_id')) {
            return redirect()->route('login')->with('error', 'Session expired. Please register again.');
        }

        return view('auth.verify-otp');
    }

    /**
     * Verify OTP code
     */
    public function verifyOTP(Request $request): RedirectResponse
    {
        $request->validate([
            'otp' => ['required', 'string', 'size:6'],
        ]);

        $userId = session('otp_user_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Session expired. Please login again.');
        }

        $user = User::find($userId);
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found.');
        }

        // Check if OTP matches and is not expired
        if ($user->otp_code !== $request->otp) {
            return back()->withErrors(['otp' => 'Invalid verification code.']);
        }

        if (Carbon::now()->isAfter($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Verification code has expired. Please request a new one.']);
        }

        // Mark email as verified
        $user->update([
            'is_email_verified' => true,
            'email_verified_at' => Carbon::now(),
            'otp_code' => null,
            'otp_expires_at' => null,
        ]);

        // Clear session
        session()->forget('otp_user_id');

        // Login the user
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Email verified successfully! Welcome to Isan Ekiti.');
    }

    /**
     * Resend OTP code
     */
    public function resendOTP(Request $request): RedirectResponse
    {
        $userId = session('otp_user_id');
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Session expired. Please register again.');
        }

        $user = User::find($userId);
        if (!$user) {
            return redirect()->route('login')->with('error', 'User not found.');
        }

        // Generate new OTP
        $otpCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user->update([
            'otp_code' => $otpCode,
            'otp_expires_at' => Carbon::now()->addMinutes(10),
        ]);

        // Send OTP email
        try {
            Mail::to($user->email)->send(new OTPMail($otpCode, $user->name));
            return back()->with('success', 'A new verification code has been sent to your email.');
        } catch (\Exception $e) {
            \Log::error('Failed to resend OTP email: ' . $e->getMessage());
            return back()->with('error', 'Failed to send verification code. Please try again.');
        }
    }
}
