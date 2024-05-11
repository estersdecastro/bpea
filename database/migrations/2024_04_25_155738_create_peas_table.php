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
        /**
         * Create the peas table.
         */
        Schema::create('peas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('category_id')->nullable();
            $table->integer('year')->nullable();
            $table->string('format');
            $table->string('keyword')->nullable();
            $table->string('type');
            $table->string('location')->nullable();
            $table->string('use');
            $table->string('original_source');
            $table->text('description');


            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peas');
    }
};
