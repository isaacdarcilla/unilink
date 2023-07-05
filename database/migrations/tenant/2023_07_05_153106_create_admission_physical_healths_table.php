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
        Schema::create('admission_physical_healths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admission_personal_profile_id')->constrained(null, 'id', 'health_background_profile_id');
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('facial_marks')->nullable();
            $table->string('physical_condition')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('relationship')->nullable();
            $table->string('emergency_contact_address')->nullable();
            $table->string('emergency_contact_number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_physical_healths');
    }
};
