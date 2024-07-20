<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->longText('desc')->nullable();
            $table->unsignedInteger('status')->nullable();
            $table->timestamp('start_date');
            $table->timestamp('end_date')->nullable();
            $table->foreignId('project_id');
            $table->foreignId('user_id')->nullable();
            $table->unsignedInteger('priority');
            $table->unsignedInteger('duration')->nullable();
            $table->unsignedInteger('duration_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
