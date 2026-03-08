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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('church_classes')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('instructor')->nullable();
            $table->string('date');
            $table->text('venue');
            $table->string('venue_type')->default('physical'); //physical, online
            $table->longText('content')->nullable();
            $table->string('status')->default('active');
            $table->string('content_type')->default('text');//video, text, audio
            $table->string('comments')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
