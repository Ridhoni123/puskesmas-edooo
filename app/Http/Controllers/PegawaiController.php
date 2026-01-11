<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index()
    {
        // Menampilkan semua user urut berdasarkan nama
        $data = User::orderBy('name', 'asc')->get();
        return view('pegawai.index', compact('data'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'level' => 'required|in:admin,kepala,petugas',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
            'level' => $request->level,
        ]);

        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pegawai.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id, // Abaikan email milik sendiri
            'level' => 'required|in:admin,kepala,petugas',
        ]);

        $user = User::findOrFail($id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
        ];

        // Jika password diisi, maka update password. Jika kosong, biarkan password lama.
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Mencegah admin menghapus dirinya sendiri saat sedang login
        if (auth()->user()->id == $user->id) {
            return back()->with('error', 'Anda tidak bisa menghapus akun sendiri!');
        }

        $user->delete();
        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai Berhasil Dihapus');
    }
}
