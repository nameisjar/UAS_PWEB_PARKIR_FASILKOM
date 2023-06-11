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
        Schema::create('parkirs', function (Blueprint $table) {
            $table->id();
            $table->string('plat_nomor')->unique();
            $table->unsignedBigInteger('id_jenis_kendaraan');
            $table->foreign('id_jenis_kendaraan')->references('id')->on('jenis__kendaraans');
            $table->unsignedBigInteger('id_admin');
            $table->foreign('id_admin')->references('id')->on('admins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parkirs');
    }
};
