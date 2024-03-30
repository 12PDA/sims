<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'  => 'Praditasari Dyah Agustin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'posisi'    => 'Web Developer',
            'foto'    => 'foto.jpg',
            'role'      => 1
        ]);
    }
}
