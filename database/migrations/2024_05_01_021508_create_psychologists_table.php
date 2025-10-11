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
        Schema::create('psychologists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_type_id')->constrained('document_types');
            $table->string('identification_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('professional_card_number')->unique();
            $table->text('academic_profile')->nullable();
            
            // CAMPOS NUEVOS PARA EL PERFIL
            $table->string('profile_photo')->nullable(); // Foto de perfil
            $table->string('specialty')->nullable(); // Especialidad
            $table->string('phone')->nullable(); // Teléfono
            
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psychologists');
    }
};