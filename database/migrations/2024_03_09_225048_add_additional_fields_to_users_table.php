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
        Schema::table('users', function (Blueprint $table) {
            $table->string('business_name')->nullable();
            $table->string('address_one')->nullable();
            $table->string('address_two')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('image')->nullable();
            $table->string('monthly_sales_volume')->nullable();
            $table->unsignedBigInteger('referral_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'business_name',
                'address_one',
                'address_two',
                'country',
                'state',
            ]);
        });
    }
};
