<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('menu_id');
            $table->string('name');
            $table->string('slug');
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->text('title')->nullable();
            $table->text('heading')->nullable();
            $table->longText('details')->nullable();
            $table->integer('displayOrder')->default(0);
            $table->string('display',5)->default('yes');
            $table->string('image')->nullable();
            $table->string('position')->nullable();
            $table->integer('parent_id')->default(0);
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
        Schema::dropIfExists('menus');
    }
}
