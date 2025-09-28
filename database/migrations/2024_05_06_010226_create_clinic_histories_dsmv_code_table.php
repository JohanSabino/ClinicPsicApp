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
        Schema::create('clinic_histories_dsmv_code', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dsmv_code_id')->constrained('dsmv_codes');
            $table->foreignId('clinic_history_id')->constrained('clinic_histories');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinic_histories_dsmv_code');
    }
};
