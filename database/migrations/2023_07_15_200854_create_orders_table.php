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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->default(1);
            $table->string('firstName');
            $table->string('lastName');
            $table->string('country')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->unsignedInteger('phone')->nullable();
            $table->string('email')->nullable();
            $table->unsignedInteger('transaction_id')->nullable();
            $table->unsignedInteger('order_number')->nullable();
            $table->boolean('pending')->nullable();
            $table->boolean('success')->nullable();
            $table->float('totalPrice')->nullable();
            $table->text('error')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
