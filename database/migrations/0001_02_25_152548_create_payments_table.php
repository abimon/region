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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
                $table->foreignId('user_id')->constrained('users','id')->cascadeOnDelete();
                $table->foreignId('church_class_id')->constrained('church_classes','id')->cascadeOnDelete();
                $table->string('account');
                $table->string('amount');
                $table->string('payment_method');
                $table->string('transaction_id')->nullable();
                $table->enum('status',['pending','completed','failed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
