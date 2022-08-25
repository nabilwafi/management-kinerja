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
        Schema::create('detail_kinerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kinerja')->constrained('kinerjas')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status_kegiatan', ['belum mengambil', 'melakukan aktivitas', 'selesai'])->default('melakukan aktivitas');
            $table->dateTime('mulai_kinerja')->nullable();
            $table->dateTime('selesai_kinerja')->nullable();
            $table->integer('sub_kegiatan_diambil')->nullable();
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
        Schema::dropIfExists('detail_kinerjas');
    }
};
