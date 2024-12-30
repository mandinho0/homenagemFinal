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
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->date('birth_date');
            $table->string('email');
            $table->string('phone');
            $table->decimal('estimated_value', 10, 2);
            $table->string('ceremony_type');
            $table->string('location');
            $table->string('religion')->nullable();
            $table->json('services')->nullable();
            $table->json('extras')->nullable();
            $table->json('contacts')->nullable();
            $table->text('final_observations')->nullable();
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
