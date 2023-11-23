<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('deegregistreer', function (Blueprint $table) {
            $table->id();
            $table->string('place');
            $table->integer('placenumber');
            $table->integer('weight');
            $table->integer('bak');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deegregistreer');
    }
};
