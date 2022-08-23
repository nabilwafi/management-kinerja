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
        Schema::create('kinerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_peserta')->constrained('pesertas');
            $table->foreignId('id_kegiatan')->constrained('kegiatans');
            $table->time('mulai_kinerja')->nullable();
            $table->time('selesai_kinerja')->nullable();
            $table->enum('status_kegiatan', ['melakukan aktivitas', 'selesai'])->default('melakukan aktivitas');
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
        Schema::dropIfExists('kinerjas');
    }
};
