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
        Schema::create('birthday_templates', function (Blueprint $table) {
            $table->id();
            $table->string('front_image');
            $table->string('svg');
            $table->tinyInteger('version')->default(0)->comment('0: free, 1: premium');
            $table->tinyInteger('default')->default(0)->comment('0: no, 1: yes');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('birthday_templates');
    }
};
