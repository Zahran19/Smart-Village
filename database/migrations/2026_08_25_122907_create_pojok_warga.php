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
        Schema::create('pojok_wargas', function (Blueprint $table) {
            $table->id();
            $table->text('img');
            $table->text('title');
            $table->text('slug');
            $table->text('short_desc');
            $table->text('content');
            $table->text('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pojok_wargas');
    }
};
