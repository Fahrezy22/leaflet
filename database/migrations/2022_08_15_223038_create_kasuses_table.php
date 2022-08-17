<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori_kasus')->constrained('kategori_kasuses')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('jumlah_laporan');
            $table->integer('jumlah_selesai');
            $table->foreignId('id_jalan')->constrained('jalans')->onUpdate('cascade')->onDelete('cascade');
            $table->text('keterangan');
            $table->text('cara');
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
        Schema::dropIfExists('kasuses');
    }
}
