<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TanamanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Tanaman::create([
            'title' => "Seledri Hidroponik",
            'slug'  => Str::slug("Seledri Hidroponik"),
            'content' => "Seledri Hidroponik",
            'tds_nutrisi' => 3,
            'ph' => 2,
            'semai' => 7,
            'pindah_tanam' => 1,
            'Pemeliharaan' => 14,
            'Panen' => 1
        ]);

        \App\Tanaman::create([
            'title' => "Cabe Hidroponik",
            'slug'  => Str::slug("Cabe Hidroponik"),
            'content' => "Cabe Hidroponik",
            'tds_nutrisi' => 3,
            'ph' => 2,
            'semai' => 7,
            'pindah_tanam' => 1,
            'Pemeliharaan' => 14,
            'Panen' => 1
        ]);

        \App\Tanaman::create([
            'title' => "Tomat Hidroponik",
            'slug'  => Str::slug("Tomat Hidroponik"),
            'content' => "Tomat Hidroponik",
            'tds_nutrisi' => 3,
            'ph' => 2,
            'semai' => 7,
            'pindah_tanam' => 1,
            'Pemeliharaan' => 14,
            'Panen' => 1
        ]);

        \App\Tanaman::create([
            'title' => "Selada Hidroponik",
            'slug'  => Str::slug("Selada Hidroponik"),
            'content' => "Selada Hidroponik",
            'tds_nutrisi' => 3,
            'ph' => 2,
            'semai' => 7,
            'pindah_tanam' => 1,
            'Pemeliharaan' => 14,
            'Panen' => 1
        ]);

        \App\Tanaman::create([
            'title' => "Sawi Hidroponik",
            'slug'  => Str::slug("Sawi Hidroponik"),
            'content' => "Sawi Hidroponik",
            'tds_nutrisi' => 3,
            'ph' => 2,
            'semai' => 7,
            'pindah_tanam' => 1,
            'Pemeliharaan' => 14,
            'Panen' => 1
        ]);
    }
}
