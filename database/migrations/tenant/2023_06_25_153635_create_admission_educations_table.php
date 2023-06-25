<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admission_educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admission_personal_profile_id')->constrained();
            $table->unsignedBigInteger('level_id');
            $table->string('school')->nullable();
            $table->string('degree')->nullable();
            $table->timestamp('inclusive_dates_from')->nullable();
            $table->timestamp('inclusive_dates_to')->nullable();
            $table->string('honors')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_educations');
    }
};
