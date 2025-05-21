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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
           $table->string('product_sku')->nullable()->change();
            $table->string('price_option')->nullable();
            $table->text('product_description')->nullable();
            $table->text('product_short_description')->nullable();
            $table->text('related_products')->nullable();
            $table->string('product_rating_review')->nullable();
            $table->string('product_image')->nullable();
            $table->decimal('product_price', 10, 2)->default(0.00);
            $table->decimal('product_discounted_price', 10, 2)->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->string('product_slug')->unique();
            $table->string('product_meta_title')->nullable();
            $table->string('product_meta_keyword')->nullable();
            $table->text('product_meta_desp')->nullable();
           $table->string('product_status')->default('active')->change();
            $table->string('product_tag')->nullable();
            $table->boolean('product_feature')->default(0);
            $table->boolean('product_is_selected')->default(0);
            $table->date('product_date')->nullable();
            $table->text('product_comment')->nullable();
            $table->string('product_color')->nullable();
            $table->integer('product_quantity')->default(0);
            $table->text('product_key_feature')->nullable();
            $table->text('product_question')->nullable();
            $table->text('product_answer')->nullable();
            $table->boolean('product_allows_custom_size')->default(0);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
