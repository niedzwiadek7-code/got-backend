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
        Schema::create('got_book_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId("got_book")->constrained();
            $table->foreignId("section")->constrained();
            $table->date("trip_date");
            $table->foreignId("badge_award")->constrained();
            $table->string("status");
            $table->boolean("b_to_a");
            $table->foreignId("trip_plan_entry")->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('got_book_entries');
    }
};
