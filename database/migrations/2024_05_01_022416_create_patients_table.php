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
        Schema::create('patients', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('document_type_id')->constrained('document_types');
            $table->string('identification_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('sexual_orientation');
            $table->integer('height');
            $table->integer('weight');
            $table->string('address');
            $table->string('marital_status');
            $table->string('school_grades');
            $table->string('eps_company');
            $table->string('occupation')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
