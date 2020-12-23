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
            'penanganan'  => 'Solusinya adalah dengan memasang jaring peneduh dengan intensitas 60 % pada bagian atas. Hal ini akan meminimalisir tanaman agar tidak berlebihan mendapatkan sinar matahari disaat cuaca yang terik.',
        ]);

        \App\Kendala::create([
            'ciri2' => "lumut",
            'penanganan'  => 'Cara membersihkan lumut yang mudah adalah&nbsp; merendam selang plastik ke dalam air panas, lalu menambahkan satu sendok makan pemutih per galon sebagai pembersih. Selanjutnya, jalankan seperti biasanya (setelah perendaman) jika menggunakan sistem NFT. Hal tersebut untuk membersihkan lumut&nbsp; yang tumbuh di dalam selang yang sulit dijamah. ',
        ]);

        \App\Kendala::create([
            'ciri2' => "air",
            'penanganan'  => 'Tanaman hidrponik memerlukan pasokan air yang sesuai aturan. Idealnya adalah debit air 1-2 liter/menit.',
        ]);
    }
}
