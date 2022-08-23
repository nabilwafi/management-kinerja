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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('pembimbings')->onUpdate('cascade')->onDelete('cascade');
            $table->string('email', 100);
            $table->string('password', 100);
            $table->string('nama_peserta', 100);
            $table->string('instansi_pendidikan');
            $table->string('jurusan');
            $table->enum('role', ['peserta', 'pembimbing', 'admin']);
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
        Schema::dropIfExists('pesertas');
    }
};
