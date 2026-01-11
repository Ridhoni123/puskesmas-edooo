<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@puskesmas.com',
            'password' => Hash::make('password'),
            'level' => 'admin',
        ]);

        // User Kepala Puskesmas
        User::create([
            'name' => 'Kepala Puskesmas',
            'email' => 'kepala@puskesmas.com',
            'password' => Hash::make('password'),
            'level' => 'kepala',
        ]);

        // User Petugas
        User::create([
            'name' => 'Petugas Medis',
            'email' => 'petugas@puskesmas.com',
            'password' => Hash::make('password'),
            'level' => 'petugas',
        ]);
    }
}
