<?php

use Illuminate\Database\Seeder;

class ForumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Forum::create([
            'user_id' => 1,
            'kategori_id' => 2,
            'judul' => 'Apa itu Hidroponik ?',
            'images' => 'hidroponik.jpg',
            'slug' => 'apa-itu-hidroponik',
            'konten' => '<p><strong>Hidroponik</strong> atau <strong>hydroponics </strong>berasal dari bahasa latin (Greek), yaitu <strong>hydro</strong> yang berarti air dan kata <strong>phonos </strong>yang berarti kerja sehingga hidroponik dimaksud sebagai air yang bekerja. Hidroponik adalah aktivitas pertanian yang dijalankan menggunakan air sebagai media untuk menggantikan tanah. Jadi, hidroponik dapat diartikan sebagai suatu pengerjaan atau pengelolaan air sebagai media tumbuh tanaman tanpa menggunakan media tanah sebagai media tanam dan mengambil unsur hara mineral yang dibutuhkan dari larutan nutrisi yang dilarutkan dalam air. Hidroponik adalah teknik penanaman dengan media tanam non tanah, bisa berupa kerikil, pasir kasar, atau sabut kelapa. Sebenarnya, hidroponik telah dikenal sejak lama. Akan tetapi, baru terbatas dalam penelitian ilmiah.<br><br><strong>Macam-macam hidroponik</strong><br>&nbsp;</p><ul><li>Static solution culture (kultur air statis)</li><li>Continuous-flow solution culture, contoh : NFT (Nutrient Film Technique),DFT (Deep Flow Technique)</li><li>Aeroponics</li><li>Passive sub-irrigation</li><li>Ebb and flow atau flood and drain sub-irrigation</li><li>Run to waste</li><li>Deep water culture</li><li>Bubbleponics</li><li>Bioponic</li></ul><p><strong>Media Tanam Inert Hidroponik</strong></p><p>Media tanam inert adalah media tanam yang tidak menyediakan unsur hara. Pada umumnya media tanam inert berfungsi sebagai buffer dan penyangga tanaman. Beberapa contoh di antaranya adalah:</p><ul><li>Arang sekam</li><li>Spons</li><li>Expanded clay</li><li>Rock wool</li><li>Coir</li><li>Perlite</li><li>Pumice</li><li>Vermiculite</li><li>Pasir</li><li>Kerikil</li><li>Serbuk kayu</li></ul><p><strong>Keuntungan teknik hidroponik</strong></p><ul><li>Tidak membutuhkan tanah</li><li>Air akan terus bersirkulasi di dalam sistem dan bisa digunakan untuk keperluan lain, misal disirkulasikan ke akuarium</li><li>Mudah dalam pengendalian nutrisi sehingga pemberian nutrisi bisa lebih efisien</li><li>Relatif tidak menghasilkan polusi nutrisi ke lingkungan</li><li>Memberikan hasil yang lebih banyak</li><li>Mudah dalam memanen hasil</li></ul><p>Untuk keperluan hiasan, pot dan tanaman akan relatif lebih bersih. Sehingga untuk menrancang interior ruangan dalam rumah akan bisa lebih leluasa dalam menempatkan pot-pot hidroponik. Bila tanaman yang digunakan adalah tanaman bunga, untuk bunga tertentu bisa diatur warna yang dikehendaki, tergantung tingkat keasaman dan basa larutan yang dipakai dalam pelarut nutrisinya</p>',
        ]);

        \App\Komentar::create([
            'konten' => 'terima kasih',
            'user_id' => 7,
            'forum_id' => 1,
            'parent' => 0
        ]);

        \App\Komentar::create([
            'konten' => 'sama-sama',
            'user_id' => 1,
            'forum_id' => 1,
            'parent' => 1
        ]);

        \App\Forum::create([
            'user_id' => 3,
            'kategori_id' => 2,
            'judul' => 'perbedaan HST dan HSS',
            'slug' => 'perbedaan-hst-hss',
            'konten' => '<p>Selamat Siang para pakar hidroponik..<br>Saya ingin bertanya lebih dalam soal HSS dan HST khususnya untuk tanaman selada.<br><br>Yg saya jumpai versi youtube untuk tanaman selada adalah :<br>H1-H10 adalah Masa semai (HSS)<br>H11 adalah pindah tanam (HST)<br>H11 - H16 --&gt; 300ppm<br>H17 - H22 --&gt; 800ppm<br>H23 - H30 --&gt; 1000ppm<br>H31 - H34 --&gt; 1200ppm<br>H35 panen. Artinya tanaman selada membutuhkan 35 hari dari awal hingga panen.<br><br>Namun yang saya jumpai diartikel atau jurnal untuk tanaman selada adalah :<br>H1-H30 adalah Masa semai (HSS)<br>H31 adalah pindah tanam (HST)<br>Lalu perhitungan kembali menjadi nol agar gampang.<br>H1 - H23 (HST) --&gt; pemberian nutrisi secara berkala<br>H24 panen. Artinya tanaman selada membutuhkan 53 - 55 hari dari awal hingga panen.<br><br>Kenapa kedua sumber tersebut berbeda ya?<br>Apa krna saya sya belum paham terkait HSS atau HST sehingga sya salah tafsir...<br>Dan yang benar seperti apa?<br>Mohon agar saya diberikan pencerahan<br><br>Terima kasih</p>'
        ]);
    }
}
