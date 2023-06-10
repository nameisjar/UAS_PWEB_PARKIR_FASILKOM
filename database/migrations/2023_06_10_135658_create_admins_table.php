<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_hp');
            $table->string('jalan');
            $table->string('nip');
            $table->unsignedBigInteger('id_provinsi');
            $table->foreign('id_provinsi')->references('id')->on('provinsis');
            $table->unsignedBigInteger('id_kota');
            $table->foreign('id_kota')->references('id')->on('kotas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
