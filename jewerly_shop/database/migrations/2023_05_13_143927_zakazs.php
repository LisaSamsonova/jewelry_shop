<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Zakazs extends Migration
{
    public function up(): void
    {
        Schema::create('zakazs', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('amount');
            $table->float('total_price');
            $table->timestamps();

            $table->foreign('buyer_id')->references('id')->on('buyers');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zakazs');
    }
};
