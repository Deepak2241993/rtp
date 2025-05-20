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
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->string('attribute_type')->nullable();
            $table->string('attribute_value')->nullable();
            $table->decimal('attribute_persqm', 10, 2)->nullable();
            $table->decimal('attribute_price', 10, 2)->nullable();
            $table->integer('attribute_quantity')->nullable();
            $table->boolean('status')->default(1); // 1 = active, 0 = inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_attributes');
    }
};
