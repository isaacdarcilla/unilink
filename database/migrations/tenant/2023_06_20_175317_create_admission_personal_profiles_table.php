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
        Schema::create('admission_personal_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('academic_year_id')->constrained();
            $table->foreignId('campus_id')->constrained();
            $table->text('profile_photo')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('prefix_name')->nullable();
            $table->string('suffix_name')->nullable();
            $table->string('sex_at_birth')->nullable();
            $table->string('gender_preference')->nullable();
            $table->string('street')->nullable();
            $table->string('barangay')->nullable();
            $table->string('municipality')->nullable();
            $table->string('province')->nullable();
            $table->string('region')->nullable();
            $table->string('temporary_street')->nullable();
            $table->string('temporary_barangay')->nullable();
            $table->string('temporary_municipality')->nullable();
            $table->string('temporary_province')->nullable();
            $table->string('temporary_region')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('landline_number')->nullable();
            $table->string('email_address')->nullable();
            $table->string('facebook_account')->nullable();
            $table->timestamp('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('gender')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('religion')->nullable();
            $table->string('rank_in_family')->nullable();
            $table->string('number_of_siblings')->nullable();
            $table->string('mean_ages_of_siblings')->nullable();
            $table->text('special_skills')->nullable();
            $table->string('favorite_sports')->nullable();
            $table->integer('scholarship_grantee')->nullable()->comment('Yes or no');
            $table->text('lrn')->nullable();
            $table->text('program_first_choice')->nullable();
            $table->text('program_second_choice')->nullable();
            $table->text('program_third_choice')->nullable();
            $table->text('gadget')->nullable()->comment('Cellphone or laptop or tablet or desktop');
            $table->integer('internet_status')->nullable()->comment('Unstable or stable or none');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_personal_profiles');
    }
};
