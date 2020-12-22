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
            'images' => 'seledri.jpg',
            'slug'  => Str::slug("Seledri Hidroponik"),
            'content' => "<p>Cara menanam&nbsp;seledri&nbsp;dengan metode&nbsp;hidroponik&nbsp;tergolong mudah dan menguntungkan. Karena sebagaimana yang diketahui,&nbsp;seledri termasuk dalam tanaman herbal yang berkhasiat bagi kesehatan tubuh&nbsp;dan&nbsp;sering digunakan sebagai campuran dalam memasak. Tanaman ini hampir selalu ditemukan dalam masakan berkuah bening. Karena dengan mencampurkan seledri aroma masakan semakin nikmat. Disamping fungsinya tersebut, tanaman seledri baik juga untuk kesehatan ginjal dan penderita darah tinggi. Namun tahukah Anda jika tanaman ini dulunya hanya dapat tumbuh di dataran tinggi? Nah, saat ini seledri bisa Anda jadikan&nbsp;tanaman hias&nbsp;di teras rumah dengan sistem hidroponik.</p><p>Melalui sistem tanam hidroponik kini seledri mampu hidup di dataran rendah. Meskipun pada dasarnya tanaman ini cocok tumbuh di dataran tinggi dengan curah hujan rendah, namun adanya hidroponik proses pertumbuhan dapat dikontrol terutama dalam kebutuhan air, nutrisi, dan faktor eksternal dari tanaman. Sehingga tanaman dapat tumbuh baik karena gizi terpenuhi. Seluruh unsur hara dari tanah dapat diwakili oleh nutrisi dari unsur makro dan mikro.</p><p>Menanam seledri secara hidroponik.</p><p>Tanaman seledri memang cocok hidup dalam media air. Beberapa sistem hidroponik yang biasa digunakan seperti penggunaan bak,&nbsp;netpot&nbsp;bersumbu (sistem Wick) atau sistem rakit apung. Berikut akan disajikan cara menanam seledri dengan hidroponik.</p><p><strong>Menyiapkan Bibit Seledri</strong></p><p>Bibit seledri dapat Anda peroleh dari menyemai&nbsp;biji seledri&nbsp;atau dengan anakan. Untuk anakan bisa Anda dapatkan di toko tanaman atau pasar. Pilihlah anakan yang baik tanpa cacat. Pisahkan anakan seledri secara hati-hati untuk meminimalisir kerusakan akar. Bagi Anda yang ingin menyemai sendiri, berikut langkahnya.</p><p>Menyemai seledri dengan media tanam arang sekam. Setelah daun sejatinya tumbuh, maka sudah bisa diberi nutrisi.</p><ul><li>Persiapkan biji seledri yang bisa Anda beli dari toko pertanian.</li><li>Isi baskom berukuran sedang dengan air.</li><li>Biji seledri kemudian direndam dalam baskom kira-kira 1 jam.</li><li>Pilah benih seledri tersebut, buanglah yang mengambang. Dan benih yang tenggelam dapat Anda gunakan sebagai bibit tanam.</li><li>Siapkan netpot yang telah diberi sumbu kain flanel. Kemudian masukan&nbsp;arang sekamke dalam netpot dan basahi dengan air.</li><li>Tempatkan benih dalam netpot. Dalam satu netpot usahakan hanya terisi 3-5 biji, karena jika terlalu banyak akan tumbuh menumpuk.</li><li>Setelah penyemaian selesai tunggu daun sejati keluar. Itulah yang menjadi tanda bahwa tanaman sudah dapat diberikan nutrisi.</li></ul><p>&nbsp;<strong>Cara Menanam Seledri</strong></p><p>Pada tahap ini Anda perlu alat tandon nutrisi, bisa pipa paralon, toples, botol bekas atau ember. Untuk artikel kali ini digunakan pipa paralon yang lebih kokoh.</p><ul><li>Mula-mula lubangi pipa paralon untuk meletakkan netpot.</li><li>Tutuplah kedua ujung pipa dengan penutup atau styrofoam agar nutrisi tidak tumpah.</li><li>Larutkan&nbsp;nutrisi AB mixsebanyak 5 ml kedalam 1 liter air bersih.</li><li>Isi paralon dengan larutan nutrisi sebesar 1260-1680 ppm dengan pH 6,5.</li><li>Letakkan netpot yang telah berisi benih kedalam lubang paralon.</li><li>Rapikan paralon dalam rak.</li><li>Buat naungan agar terhindar dari paparan matahari langsung.</li><li>Setelah kira-kira seminggu, mulailah perkenalkan sinar matahari secara bertahap.</li></ul><p>&nbsp;contoh penanaman seledri secara hidroponik sistem NFT dengan menggunakan pipa paralon. Netpot bisa diganti dengan pemanfaatan gelas plastik bekas.</p><p>&nbsp;</p><p>Menanam seledri hidroponik sistem wick.</p><p><strong>Perawatan dan Pemeliharaan</strong></p><p>Teknik yang digunakan dalam penanam seledri kali ini yaitu wick system (sistem apung). Sehingga penting diperhatikan ketersediaan nutrisi dalam pipa. Cek paralon setiap hari, jika nutrisi berkurang segera tambahkan. Tingkatkan ppm nutrisi seiring pertumbuhan tanaman. Perlu diingat, jangan sampai larutan nutrisi menyentuh netpot. Berilah jarak sekitar 1 cm dibawah netpot.</p><p><strong>Pengendalian Hama Penyakit</strong></p><p>Agar memperoleh tanaman seledri yang sehat dan bebas residu bahan kimia, kendalikan hama penyakit secara teknis. Yaitu dengan cara memungut langsung hama yang menyerang dan meniadakan tanaman yang berpenyakit. Atau Anda dapat menggunakan pestisida nabati yang disemprotkan pada seledri.</p><p>&nbsp;&nbsp;</p><p><strong>Panen Seledri Hidroponik</strong></p><p>Setelah masa tanam 1 hingga 1,5 bulan, Anda sudah dapat panen seledri. Pemanenan dapat diulang setiap 5-6 hari sekali.</p><p>Caranya, cabut tanaman seledri dari netpot. Kemudian pipa paralon dan netpot dicuci bersih sehingga dapat Anda gunakan kembali untuk menanam. Anakan seledri yang ada bisa Anda tanam kembali dengan metode yang sama. Ketika Anda menanam seledri dengan banyak, jelas tidak hanya mencukupi kebutuhan pribadi. Namun bisa juga Anda jual dan menghasilkan uang. Harga seledri dipasaran mencapai 20 ribu hingga 25 ribu per kilogram.</p>",
            'tds_nutrisi' => 3,
            'ph' => 2,
            'semai' => 7,
            'pindah_tanam' => 1,
            'Pemeliharaan' => 14,
            'Panen' => 1
        ]);

        \App\Tanaman::create([
            'title' => "Cabe Hidroponik",
            'images' => "cabe.jpg",
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
            'images' => "tomat.jpg",
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
            'images' => 'selada.jpg',
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
            'images' => "sawi.jpg",
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
