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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('psychologist_id')->constrained('psychologists');
            $table->integer('session_number');
            $table->integer('status');
            $table->text('goals')->nullable();
            $table->text('abstract')->nullable();
            $table->text('progress')->nullable();
            $table->text('mood_last_term');
            $table->text('psychological_instruments');
            $table->dateTime('schedule_at');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};