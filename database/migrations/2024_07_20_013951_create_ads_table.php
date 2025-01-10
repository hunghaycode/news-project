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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->text('ad_header');
            $table->boolean('ad_header_status');
            $table->text('ad_sidebar');
            $table->boolean('ad_sidebar_status');
            $table->text('ad_main');
            $table->boolean('ad_main_status');
            $table->text('ad_herder_url')->nullable();
            $table->text('ad_sidebar_url')->nullable();
            $table->text('ad_main_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
