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
        Schema::create('bicycles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('wheel_size');
            $table->integer('gears');
            $table->string('sex');
            $table->string('type');
            $table->string('size');
            $table->string('color');
            $table->integer('manufacturer_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bicycles');
    }
};
