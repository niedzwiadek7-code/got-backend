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
        Schema::create('trip_plan_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId("trip_plan")->constrained();
            $table->foreignId("section")->constrained();
            $table->date("trip_date");
            $table->string("status");
            $table->boolean("b_to_a");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_plan_entries');
    }
};
