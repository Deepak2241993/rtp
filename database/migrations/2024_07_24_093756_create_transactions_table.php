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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); 
            $table->integer('user_id')->nullable();
            $table->decimal('paid_amount', 10, 2);
            $table->dateTime('generated_date_time');
            $table->enum('payment_status', ['paid', 'pending', 'failed']);
            $table->text('description')->nullable();
            $table->text('transaction_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
