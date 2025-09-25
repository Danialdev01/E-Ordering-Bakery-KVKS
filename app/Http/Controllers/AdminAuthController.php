<?php
// app/Http/Controllers/AdminAuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        // Cek apakah admin aktif
        $admin = Admin::where('username', $request->username)
                    ->where('is_active', true)
                    ->first();

        if (!$admin) {
            return back()->withErrors([
                'username' => 'Akun tidak ditemukan atau tidak aktif.'
            ]);
        }

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            
            // Log aktivitas login
            activity('admin')
                ->causedBy($admin)
                ->log('Admin logged in');
            
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'username' => 'Kredensial tidak valid.',
        ])->withInput($request->except('password'));
    }

    public function logout(Request $request)
    {
        // Log aktivitas logout
        if (Auth::guard('admin')->check()) {
            activity('admin')
                ->causedBy(Auth::guard('admin')->user())
                ->log('Admin logged out');
        }

        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $admin = Auth::guard('admin')->user();
        $stats = [
            'total_users' => \App\Models\User::count(),
            'active_users' => \App\Models\User::where('is_active', true)->count(),
            'today_logins' => 0, // Bisa diisi dengan log activity
        ];

        return view('admin.dashboard', compact('admin', 'stats'));
    }

    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->new_password) {
            if (!Hash::check($request->current_password, $admin->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini tidak valid.']);
            }
            $admin->password = Hash::make($request->new_password);
        }

        $admin->save();

        activity('admin')
            ->causedBy($admin)
            ->log('Profile updated');

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}