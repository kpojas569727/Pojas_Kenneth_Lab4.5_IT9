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
            $table->string('order_number', 50)->nullable(false);
            $table->foreignId('customer_id')->references('id')->on('customers')->nullable(false);
            $table->foreignId('users_id')->references('id')->on('users')->nullable(false);
            $table->datetime('order_date')->nullable(false);
            $table->string('status', 20)->nullable(false);
            $table->decimal('total_amount', 10, 2)->nullable(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            
            
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
