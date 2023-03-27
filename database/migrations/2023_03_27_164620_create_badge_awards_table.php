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
        Schema::create('badge_awards', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user")->constrained();
            $table->foreignId("badge")->constrained();
            $table->date("grant_date");
            $table->string("badge_award_status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_awards');
    }
};
