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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            // Foreign keys
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');

            // Order item details
            $table->string('name');
            $table->integer('qty');
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('print_side')->nullable();
            $table->string('pickup_option')->nullable();
            $table->string('document')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('total', 10, 2);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
