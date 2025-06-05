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
        Schema::create('cutting_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('cutting_type'); // e.g., "Trim to Size"
            $table->decimal('min_qty', 10, 2)->nullable();
            $table->decimal('max_qty', 10, 2)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutting_options');
    }
};
