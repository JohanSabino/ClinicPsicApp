<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')->constrained('patients')->cascadeOnDelete();
            $table->foreignId('psychologist_id')->constrained('psychologists')->cascadeOnDelete();

            $table->integer('session_number')->default(1);
            $table->dateTime('schedule_at');

            $table->string('status', 20)->default('pending');
            $table->text('notes')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};