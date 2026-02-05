<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('auth.profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update Nama
        $user->name = $request->name;

        // Proses Upload Foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika bukan foto default
            if ($user->foto && $user->foto !== 'user.jpeg' && Storage::disk('public')->exists('profile/' . $user->foto)) {
                Storage::disk('public')->delete('profile/' . $user->foto);
            }

            $namaFoto = time() . '_' . $user->name . '.' . $request->foto->extension();
            $request->foto->storeAs('profile', $namaFoto, 'public');
            $user->foto = $namaFoto;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Profil dan foto berhasil diperbarui!');
    }
}
