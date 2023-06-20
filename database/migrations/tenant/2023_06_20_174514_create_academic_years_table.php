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
        Schema::create('academic_years', function (Blueprint $table) {
            $table->id();
            $table->string('academic_year_start')->nullable();
            $table->string('academic_year_end')->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->nullable()->default(1)->comment(
                'Status of the academic year, enabled or disabled'
            );
            $table->integer('module_type')->nullable()->comment(
                'Module the year is used, admission or enrollment or grading'
            );
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_years');
    }
};
