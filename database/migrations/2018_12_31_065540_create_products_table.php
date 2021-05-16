<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->string('description')->nullable();
            $table->longText('details')->nullable();
            $table->string('file')->nullable();
            $table->string('image')->nullable();
            $table->string('price',50)->nullable();
            $table->string('display',10)->nullable();
            $table->unsignedInteger('cat_id');
            $table->foreign('cat_id')
                  ->references('cat_id')->on('categories')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('products_cat_id_foreign');
        Schema::dropIfExists('products');
    }
}
