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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('roomtype_id');
            $table->string('total')->nullable();
            $table->string('room_capacity')->nullable();
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->string('number_seats')->nullable();
            $table->string('size')->nullable();
            $table->string('description')->nullable();
            $table->integer('discount')->default(0);
            $table->text('short_desc')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
