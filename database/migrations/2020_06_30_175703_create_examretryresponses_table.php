<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamretryresponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examretryresponses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('exam_id');
            $table->string('question_id');
            $table->string('option_id');
            $table->string('answer');
            $table->string('status');
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
        Schema::dropIfExists('examretryresponses');
    }
}
