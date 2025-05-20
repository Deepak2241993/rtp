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
        Schema::create('fixed_price_ranges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fixed_price_option_id')->nullable(); // foreign key if needed
            $table->integer('min_qty')->default(1);
            $table->integer('max_qty')->nullable();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixed_price_ranges');
    }
};
