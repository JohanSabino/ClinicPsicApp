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
            $table->id();
            $table->unsignedInteger('document_type_id');
            $table->string('identification_number');
            $table->string('name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->date('birth_date');
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('school_grade')->nullable();
            $table->string('eps_company')->nullable();
            $table->string('occupation')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('document_type_id')->references('id')->on('document_types');
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
