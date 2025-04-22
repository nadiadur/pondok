<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    // Update Password
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        ]);
    
        User::where('id', Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    
        return back()->with('success', 'Profil berhasil diperbarui.');
    }
    


    // Hapus Akun
    public function deleteAccount(Request $request)
    {
        $user = Auth::user(); // Pastikan user yang login diambil
    
        if ($user) {
            Auth::logout(); // Logout sebelum akun dihapus
            User::where('id', $user->id)->delete(); // Hapus akun dengan query builder
        }
    
        return redirect('/')->with('success', 'Akun Anda telah dihapus.');
    }
     public function account()
{
    return view('user.account');
}
public function updatePassword(Request $request)
{
    try {
        // Validasi input
        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
            'new_password_confirmation' => 'required' // tambahkan validasi untuk konfirmasi
        ]);

        $user = Auth::user();

        // Cek jika user ditemukan
        if (!$user) {
            return back()->withErrors(['error' => 'User tidak ditemukan.']);
        }

        // Cek password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
        }

        // Update password
        User::where('id', $user->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Password berhasil diperbarui.');

    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
    }
}

}
