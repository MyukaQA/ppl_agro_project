<?php

use Illuminate\Database\Seeder;

class KendalaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Kendala::create([
            'ciri2' => "daun",
            'penanganan'  => 'daun konten',
        ]);

        \App\Kendala::create([
            'ciri2' => "lumut",
            'penanganan'  => 'lumut konten',
        ]);

        \App\Kendala::create([
            'ciri2' => "air",
            'penanganan'  => 'air konten',
        ]);
    }
}
