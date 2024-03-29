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
            $table->text('image');
            $table->text('thumbnail');
            $table->enum('type', [1, 2, 3])->comment('1: landscape, 2: portrait, 3: square');
            $table->tinyInteger('version')->default(0)->comment('0: free, 1: premium');
            $table->timestamps();
            $table->softDeletesTz();
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
