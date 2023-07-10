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
        Schema::create('admission_family_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admission_personal_profile_id')->constrained(null, 'id', 'family_background_profile_id');
            $table->string('type')->nullable()->comment('father, mother');
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->text('address')->nullable();
            $table->text('email_address')->nullable();
            $table->text('mobile_number')->nullable();
            $table->string('highest_educational_attainment')->nullable();
            $table->string('occupation')->nullable();
            $table->string('monthly_income')->nullable();
            $table->string('company')->nullable();
            $table->string('company_address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_family_backgrounds');
    }
};
