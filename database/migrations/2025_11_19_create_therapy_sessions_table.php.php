<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
       Schema::create('therapy_sessions', function (Blueprint $table) {

            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->cascadeOnDelete();
            $table->foreignId('psychologist_id')->constrained('psychologists')->cascadeOnDelete();

            $table->integer('session_number');   // # de la sesión (1,2,3,…)
            $table->dateTime('date');            // fecha en que se atendió

            // Historia clínica de la sesión
            $table->text('goals')->nullable();
            $table->text('abstract')->nullable();
            $table->text('progress')->nullable();
            $table->text('mood_last_term')->nullable();
            $table->text('psychological_instruments')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};