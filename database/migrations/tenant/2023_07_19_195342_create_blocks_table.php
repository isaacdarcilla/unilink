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
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained();
            $table->foreignId('year_level_id')->constrained();
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
        Schema::dropIfExists('blocks');
    }
};
