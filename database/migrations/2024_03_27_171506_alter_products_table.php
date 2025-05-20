<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Intervention\Image\Colors\Rgb\Channels\Blue;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('product', function(Blueprint $table){
            $table->text('product_short_description')->nullable()->after('product_description');
            $table->text('realated_products')->nullable()->after('product_short_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function(Blueprint $table){
            $table->dropColumn('product_short_description');
            $table->dropColumn('realated_products');
        });
    }
};
