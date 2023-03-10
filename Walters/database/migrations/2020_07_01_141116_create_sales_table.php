<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('product_id');
            $table->string('bill_id');
            $table->string('brancode');
            $table->string('productname');
            $table->string('type');
            $table->string('nbs');
            $table->string('quantity');
            $table->string('price');
            $table->string('oprice');
            $table->string('nas');
            $table->string('sold');
            $table->string('sinlgleleft');
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
        Schema::dropIfExists('sales');
    }
}
