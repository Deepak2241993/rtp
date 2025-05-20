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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('cat_sub_name');
            $table->string('cat_sub_slug')->unique();
            $table->text('cat_sub_description')->nullable();
            $table->string('cat_sub_image')->nullable();
            $table->enum('cat_sub_status', ['active', 'inactive'])->default('active');
            $table->integer('cat_sub_orderby')->default(0);
            $table->boolean('is_selected')->default(false);
            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
