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
        Schema::create('slot__parkirs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_parkir');
            $table->foreign('id_parkir')->references('id')->on('parkirs');
            $table->unsignedBigInteger('id_jenis_kendaraan');
            $table->foreign('id_jenis_kendaraan')->references('id')->on('jenis_kendaraans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slot__parkirs');
    }
};
