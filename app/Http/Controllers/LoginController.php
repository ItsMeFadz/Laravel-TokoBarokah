<?php

namespace App\Http\Controllers;

use App\Models\SettingModel;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        $settingItem = SettingModel::first();
        return view('auth.login', [
            'title' => 'Login',
            'settingItem' => $settingItem, // Menambahkan settingItem ke dalam array
        ]);
    }

    public function login_proses(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ], [
            'email.exists' => 'Email tidak terdaftar.',
            'password.required' => 'Password harus diisi.',
        ]);

        // Cek apakah user sudah terblokir
        $user = DB::table('users')->where('email', $credentials['email'])->first();
        if ($user && $user->blokir) {
            return back()->with('loginError', 'Akun Anda telah terblokir. Silahkan hubungi admin.');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Reset jumlah kesalahan login jika berhasil login
            DB::table('users')->where('email', $credentials['email'])->update(['salah_password' => 0]);

            return redirect()->route('dashboard');
        } else {
            // Jika user tidak berhasil login, tambahkan jumlah kesalahan login
            if ($user) {
                $salah_password = $user->salah_password + 1;
                // Jika sudah salah login 3x, blokir akun
                if ($salah_password >= 3) {
                    DB::table('users')->where('email', $credentials['email'])->update(['blokir' => true]);
                    return back()->with('loginError', 'Anda telah melakukan 3x kesalahan login. Akun Anda telah terblokir. Silahkan hubungi admin.');
                }
                DB::table('users')->where('email', $credentials['email'])->update(['salah_password' => $salah_password]);

                $attemptsLeft = 3 - $salah_password;
                return back()->with('loginError', 'Login Gagal. Anda memiliki ' . $attemptsLeft . ' percobaan login tersisa.')->with('loginAttemptsLeft', $attemptsLeft);
            }

            return back()->with('loginError', 'Login Gagal!');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

}
