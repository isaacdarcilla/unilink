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
        Schema::create('year_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('college_id')->constrained();
            // TODO: Must have program_id
            $table->integer('position')->nullable();
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
            $table->integer('status')->default(1)->comment('Enabled  or disabled');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('year_levels');
    }
};
