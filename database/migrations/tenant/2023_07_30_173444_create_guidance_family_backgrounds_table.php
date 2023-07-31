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
        Schema::create('guidance_family_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guidance_profile_id')->constrained();
            $table->string('type')->nullable()->comment('father, mother');
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('age')->nullable();
            $table->string('religion')->nullable();
            $table->string('nationality')->nullable();
            $table->string('highest_educational_attainment')->nullable();
            $table->string('occupation')->nullable();
            $table->string('place_of_work')->nullable();
            $table->string('work_address')->nullable();
            $table->string('home_address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('family_monthly_income')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guidance_family_backgrounds');
    }
};
