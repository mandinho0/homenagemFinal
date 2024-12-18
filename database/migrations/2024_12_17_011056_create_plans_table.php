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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(false);
            $table->string('ceremony_type');
            $table->string('location');
            $table->json('customizations')->nullable();
            $table->date('seventh_day')->nullable();
            $table->date('death_anniversary')->nullable();
            $table->json('extras')->nullable();
            $table->text('final_observations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
