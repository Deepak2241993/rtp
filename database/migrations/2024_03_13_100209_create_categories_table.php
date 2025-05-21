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
        Schema::create('categories', function (Blueprint $table) {
             $table->id();
            $table->string('cat_name');
            $table->string('cat_slug')->unique();
            $table->text('cat_description')->nullable();
            $table->string('cat_image')->nullable();
            $table->enum('cat_status', ['active', 'inactive'])->default('active');

            $table->integer('cat_orderby')->default(0);
            $table->boolean('is_selected')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
