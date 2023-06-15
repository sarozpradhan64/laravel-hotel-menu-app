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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_category_id')->references('id')->on('menu_categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique()->index();
            $table->string('currency')->default('NRS.');
            $table->integer('price');
            $table->string('quantity')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->boolean('state')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
