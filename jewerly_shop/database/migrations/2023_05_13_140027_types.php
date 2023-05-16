<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Types extends Migration
{
    public function up(): void
    {
        Schema::create('types', function (Blueprint $table) {
            
            $table->id();
            $table->string('title');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};
