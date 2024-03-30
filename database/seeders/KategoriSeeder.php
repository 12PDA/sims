<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'nama_kategori'  => 'Alat Musik'
        ]);
        Kategori::create([
            'nama_kategori'  => 'Alat Olahraga'
        ]);
    }
}
