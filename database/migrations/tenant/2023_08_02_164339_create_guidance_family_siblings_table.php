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
        Schema::create('guidance_family_siblings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guidance_family_background_id')->constrained();
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('school_or_place_of_work')->nullable();
            $table->string('year_level_or_occupation')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guidance_family_siblings');
    }
};
