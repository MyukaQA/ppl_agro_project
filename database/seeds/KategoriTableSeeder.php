<?php

use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Kategori::create([
            'nama' => "Marketing"
        ]);

        \App\Kategori::create([
            'nama' => "Tanaman"
        ]);

        \App\Kategori::create([
            'nama' => "Hama"
        ]);
    }
}
