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
        Schema::create('potensi_galeri', function (Blueprint $table) {
            $table->id();
            $table->text('type'); // ada 2 type: potensi and galeri
            $table->text('img');
            $table->text('title');
            $table->text('short_desc'); // potensi only
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potensi_galeri');
    }
};
