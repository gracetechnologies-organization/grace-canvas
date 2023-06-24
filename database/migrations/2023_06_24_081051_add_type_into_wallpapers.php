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
        Schema::table('wallpapers', function (Blueprint $table) {
            $table->tinyInteger('type')->after('front_image')->default(1)->index()->comment('1: Wallpaper, 2: Preview');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wallpapers', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
