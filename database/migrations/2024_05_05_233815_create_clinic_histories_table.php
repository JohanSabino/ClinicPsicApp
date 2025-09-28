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
        Schema::create('clinic_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients');
            $table->text('reason_for_consultation_type');
            $table->text('reason_for_consultation');
            $table->text('trigger_for_consultation');
            $table->string('term_of_pregnancy')->nullable();
            $table->json('prenatal_issues')->nullable();
            $table->json('birth_data')->nullable();
            $table->text('birth_data_complement')->nullable();
            $table->text('childhood_description')->nullable();
            $table->json('cognitive_development')->nullable();
            $table->text('cognitive_development_complement')->nullable();
            $table->json('pathologies');
            $table->text('pathologies_complement')->nullable();
            $table->text('psychiatric_medication');
            $table->text('surgeries')->nullable();
            $table->text('hospitalizations')->nullable();
            $table->json('siblings')->nullable();
            $table->text('living_with')->nullable();
            $table->text('household')->nullable();
            $table->text('marriage_history')->nullable();
            $table->string('children')->nullable();
            $table->text('children_relationship')->nullable();
            $table->string('parents')->nullable();
            $table->text('parents_relationship')->nullable();
            $table->json('health_habits')->nullable();
            $table->text('patient_normal_day')->nullable();
            $table->json('family_psychological_history')->nullable();
            $table->text('family_psychological_history_complement')->nullable();
            $table->json('family_medical_history')->nullable();
            $table->text('family_medical_history_complement')->nullable();
            $table->json('family_neurological_history')->nullable();
            $table->text('family_neurological_history_complement')->nullable();
            $table->text('previous_therapy')->nullable();
            $table->string('diagnostic_impression_dsmv')->nullable();
            $table->text('general_observations')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinic_histories');
    }
};
