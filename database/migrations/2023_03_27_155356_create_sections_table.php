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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->foreignId("mountain_range")->constrained();
            $table->integer("badge_points_a_to_b");
            $table->integer("badge_points_b_to_a");
            $table->unsignedBigInteger('terrain_point_a');
            $table->unsignedBigInteger('terrain_point_b');
            $table->foreign('terrain_point_a')->references('id')->on('terrain_points')->onDelete('cascade');
            $table->foreign('terrain_point_b')->references('id')->on('terrain_points')->onDelete('cascade');
            $table->boolean("blocked")->default("0");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
