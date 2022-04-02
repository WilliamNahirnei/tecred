<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->integer('idProduct')->autoIncrement()->unique();
            $table->string('nameProduct', 255);
            $table->integer('quantityProduct');
            $table->addColumn('tinyInteger', 'statusProduct', ['length' => 1]);
            $table->timestamps();
            $table->integer('idCategory');
            $table->foreign('idCategory')->references('idCategory')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
