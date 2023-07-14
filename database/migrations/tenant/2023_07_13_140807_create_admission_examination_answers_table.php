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
        Schema::create('admission_examination_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('academic_year_id')->constrained();
            $table->foreignId('admission_questionnaire_id')->constrained();
            $table->foreignId('admission_examination_id')->constrained();
            $table->integer('answer')->nullable()->comment('The array key of the choice');
            $table->string('answer_text')->nullable()->comment('Users answer');
            $table->integer('correct_answer')->nullable()->comment('Array key');
            $table->string('correct_answer_text')->nullable()->comment('Text');
            $table->integer('gathered_points')->nullable();
            $table->boolean('is_correct')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_examination_answers');
    }
};
