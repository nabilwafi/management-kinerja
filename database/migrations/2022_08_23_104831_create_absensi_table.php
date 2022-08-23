<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_peserta')->constrained('pesertas')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tanggal_pertemuan');
            $table->integer('no_pertemuan', false, true);
            $table->time('jam');
            $table->string('lokasi', 100);
            $table->enum('status', ['belum terverifikasi', 'menunggu verifikasi', 'terverifikasi'])->default('belum terverifikasi');
            $table->text('keterangan');
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
        Schema::dropIfExists('absensis');
    }
};
