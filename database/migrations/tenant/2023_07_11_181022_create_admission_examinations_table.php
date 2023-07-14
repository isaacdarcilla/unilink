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
        Schema::create('admission_examinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('academic_year_id')->constrained();
            $table->string('status')->nullable()->default('pending')->comment('pending, taken, passed, failed');
            $table->integer('total_points')->nullable();
            $table->integer('passing_score')->nullable(80)->comment('percentage of passing');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_examinations');
    }
};
