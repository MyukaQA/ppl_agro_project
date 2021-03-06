<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjadwalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjadwalans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('tanaman_id');
            $table->date('start_date');
            $table->integer('plus_date_semai')->default(0);
            $table->integer('plus_date_pindah_tanam')->default(0);
            $table->integer('plus_date_penjadwalan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjadwalans');
    }
}
