<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table){
            
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('type_id');
            $table->float('price');
            $table->string('discription');

            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
