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
        Schema::create('photo_collages', function (Blueprint $table) {
            $table->id();
            $table->text('image');
            $table->text('thumbnail');
            $table->timestamps();
            $table->softDeletesTz();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_collages');
    }
};
