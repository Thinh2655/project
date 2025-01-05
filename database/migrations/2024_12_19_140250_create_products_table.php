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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150)->unique();
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->integer('sale_price');
            $table->string('image_url', 255);
            $table->integer('category_id')->unsigned();
            $table->tinyInteger('status')->default(1);
            $table->integer('like')->default(0);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
        Schema::dropIfExists('products');
    }
};
