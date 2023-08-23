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
        Schema::create('wallpapers', function (Blueprint $table) {
            $table->id();
            $table->text('front_image');
            $table->text('thumbnail')->nullable();
            $table->tinyInteger('type')->default(1)->index()->comment('1: wallpaper, 2: preview');
            $table->foreignId('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallpapers');
    }
};
