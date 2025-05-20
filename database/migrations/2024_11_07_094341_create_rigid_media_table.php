<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRigidMediaTable extends Migration
{
    public function up()
    {
        Schema::create('rigid_media', function (Blueprint $table) {
            $table->id();  
            $table->string('media_type');  
            $table->decimal('min_range', 10, 2); 
            $table->decimal('max_range', 10, 2); 
            $table->decimal('price', 10, 2); 
        
            $table->unsignedBigInteger('product_id');  
            $table->unsignedBigInteger('product_price_id');  
        
            $table->timestamps();  
            
          
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('rigid_media');
    }
}
