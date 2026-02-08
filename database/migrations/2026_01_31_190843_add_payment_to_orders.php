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
        Schema::table('orders', function (Blueprint $table) {
            // Jodi payment_method column na thake, tobe add korbe
            if (!Schema::hasColumn('orders', 'payment_method')) {
                $table->string('payment_method')->default('cod');
            }
            
            // Jodi payment_status column na thake, tobe add korbe
            if (!Schema::hasColumn('orders', 'payment_status')) {
                $table->string('payment_status')->default('unpaid');
            }
            
            // Jodi transaction_id column na thake, tobe add korbe
            if (!Schema::hasColumn('orders', 'transaction_id')) {
                $table->string('transaction_id')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['payment_method', 'payment_status', 'transaction_id']);
        });
    }
};