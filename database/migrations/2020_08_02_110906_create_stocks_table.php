<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('inventories_id')->unsigned();
            // $table->foreign('inventories_id')->references('id')->on('inventories');

            $table->string('inventory_id');
            $table->date('dateToMaturity');
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->string('price')->nullable();
            $table->string('unit')->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
