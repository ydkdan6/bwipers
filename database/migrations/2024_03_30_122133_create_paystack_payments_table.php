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
        Schema::create('paystack_payments', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained();
            // $table->foreignId('order_id')->constrained();
            // $table->double('amount_paid');
            // $table->double('amount');
            // $table->string('cherix_reference');
            // $table->string('paystack_reference');
            // $table->string('currency');
            // $table->boolean('status')->default(false);
            $table->string('transaction_id')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('email');
            $table->string('payment_type');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->decimal('amount', 15, 2);
            $table->decimal('referral_amount', 15, 2)->nullable();
            $table->string('status');
            $table->text('response')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paystack_payments');
    }
};
