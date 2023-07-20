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
        Schema::create('guidance_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('academic_year_id')->constrained();
            $table->foreignId('campus_id')->constrained();

            $table->foreignId('college_id')->constrained();
            $table->foreignId('year_level_id')->constrained(); // TODO
            $table->foreignId('block_id')->constrained();
            $table->foreignId('semester_id')->constrained();

            $table->integer('application_status')->nullable()->comment(
                'application pending, application approved, application declined, approved'
            );

            $table->string('application_progress')->nullable()->comment(
                'personal, family, social, health, completed'
            );

            $table->string('student_type')->nullable()->comment('old and new');

            // Profile

            $table->text('profile_photo')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('prefix_name')->nullable();
            $table->string('suffix_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('religion')->nullable();
            $table->timestamp('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();

            $table->string('street')->nullable();
            $table->string('barangay')->nullable();
            $table->string('municipality')->nullable();
            $table->string('province')->nullable();
            $table->string('region')->nullable();
            $table->string('zip_code')->nullable();

            $table->string('boarding_house_street')->nullable();
            $table->string('boarding_house_barangay')->nullable();
            $table->string('boarding_house_municipality')->nullable();
            $table->string('boarding_house_province')->nullable();
            $table->string('boarding_house_region')->nullable();
            $table->string('boarding_house_zip_code')->nullable();

            $table->string('nationality')->nullable();
            $table->string('contact_number')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guidance_profiles');
    }
};
