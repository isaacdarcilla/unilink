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
        Schema::create('guidance_health_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guidance_profile_id')->constrained();
            $table->string('question_key')->nullable();
            $table->longText('answer')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guidance_health_backgrounds');
    }
};
