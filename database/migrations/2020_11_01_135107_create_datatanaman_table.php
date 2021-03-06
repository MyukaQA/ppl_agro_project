<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatatanamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dataTanaman', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 191);
            $table->string('images',191)->nullable();
            $table->string('slug', 191);
            $table->text('content');
            $table->integer('tds_nutrisi');
            $table->integer('ph');
            $table->integer('semai');
            $table->integer('pindah_tanam');
            $table->integer('pemeliharaan');
            $table->integer('panen');
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
        Schema::dropIfExists('dataTanaman');
    }
}
