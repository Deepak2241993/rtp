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
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->decimal('product_width', 8, 2)->nullable();
            $table->decimal('product_height', 8, 2)->nullable();
            $table->decimal('product_persqm', 8, 2)->nullable();
            $table->integer('product_quantity')->nullable();
            $table->decimal('product_persqm_qty', 8, 2)->nullable();
            $table->decimal('product_price_per_sq_meter_trim', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_price');
    }
};
