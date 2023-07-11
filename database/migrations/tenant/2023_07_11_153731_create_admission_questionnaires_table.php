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
        Schema::create('admission_questionnaires', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable()->comment('multiple choice, fill blanks, essay');
            $table->string('questionnaire')->nullable();
            $table->text('questionnaire_description')->nullable();
            $table->json('choices')->nullable();
            $table->integer('points')->nullable()->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_questionnaires');
    }
};
