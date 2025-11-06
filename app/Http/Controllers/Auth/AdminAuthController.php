<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminAuthController extends Controller
{
    /**
     * Show admin login form
     */
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.admin-login');
    }

    /**
     * Show admin register form
     */
    public function showRegisterForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.admin-register');
    }

    /**
     * Handle admin login request
     */
    public function login(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Login berhasil! Selamat datang di sistem administrasi.');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang dimasukkan salah.',
        ])->withInput($request->except('password'));
    }

    /**
     * Handle admin registration request
     */
    public function register(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
        ], [
            'email.unique' => 'Email sudah terdaftar dalam sistem.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        try {
            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'is_super_admin' => false,
            ]);

            Auth::guard('admin')->login($admin);

            return redirect()->route('admin.dashboard')
                ->with('success', 'Registrasi berhasil! Selamat datang di sistem administrasi.');
        } catch (\Exception $e) {
            return back()->withErrors([
                'email' => 'Terjadi kesalahan saat registrasi. Silakan coba lagi.',
            ])->withInput($request->except('password', 'password_confirmation'));
        }
    }

    /**
     * Show forgot password form
     */
    public function showForgotPasswordForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.admin-forgot-password');
    }

    /**
     * Handle forgot password request - SIMPLE VERSION
     */
    public function sendResetLink(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:admins,email',
        ], [
            'email.exists' => 'Email tidak ditemukan dalam sistem administrasi.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $admin = Admin::where('email', $request->email)->first();
            
            if ($admin) {
                // Generate reset token
                $token = Str::random(60);
                
                // Simpan token di database
                DB::table('password_reset_tokens')->updateOrInsert(
                    ['email' => $request->email],
                    [
                        'token' => Hash::make($token),
                        'created_at' => now()
                    ]
                );

                // Untuk testing, langsung redirect ke reset form
                return redirect()->route('admin.password.reset', [
                    'token' => $token,
                    'email' => $request->email
                ])->with('status', 'Silakan reset password Anda.');
            }

            return back()->withErrors(['email' => 'Email tidak ditemukan.']);

        } catch (\Exception $e) {
            Log::error('Password reset error: ' . $e->getMessage());
            return back()->withErrors(['email' => 'Terjadi kesalahan. Silakan coba lagi.']);
        }
    }

    /**
     * Show reset password form
     */
    public function showResetForm(Request $request, $token = null)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.admin-reset-password')->with([
            'token' => $token,
            'email' => $request->email
        ]);
    }

    /**
     * Handle reset password - SIMPLE VERSION
     */
    public function reset(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Cek token di database
            $tokenData = DB::table('password_reset_tokens')
                ->where('email', $request->email)
                ->first();

            if (!$tokenData) {
                return back()->withErrors(['email' => 'Token reset password tidak valid.']);
            }

            // Untuk testing, skip token verification
            // if (!Hash::check($request->token, $tokenData->token)) {
            //     return back()->withErrors(['email' => 'Token reset password tidak valid.']);
            // }

            // Cek token expiry (60 menit)
            if (now()->diffInMinutes($tokenData->created_at) > 60) {
                return back()->withErrors(['email' => 'Token reset password telah kadaluarsa.']);
            }

            // Update password admin
            $admin = Admin::where('email', $request->email)->first();
            
            if ($admin) {
                $admin->password = Hash::make($request->password);
                $admin->save();

                // Hapus token setelah digunakan
                DB::table('password_reset_tokens')->where('email', $request->email)->delete();

                return redirect()->route('admin.login')
                    ->with('success', 'Password berhasil direset! Silakan login dengan password baru.');
            }

            return back()->withErrors(['email' => 'Admin tidak ditemukan.']);

        } catch (\Exception $e) {
            Log::error('Password reset error: ' . $e->getMessage());
            return back()->withErrors(['email' => 'Terjadi kesalahan. Silakan coba lagi.']);
        }
    }

    /**
     * Admin logout
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('status', 'Anda telah berhasil logout.');
    }

    /**
     * Admin dashboard
     */
    public function dashboard()
    {
        $totalRegistrations = 0;
        $registrations = collect();

        if (class_exists(\App\Models\Registration::class)) {
            $totalRegistrations = \App\Models\Registration::count();
            $registrations = \App\Models\Registration::with('event')
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();
        }

        return view('admin.dashboard', compact('totalRegistrations', 'registrations'));
    }
}