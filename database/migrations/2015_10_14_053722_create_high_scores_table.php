<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHighScoresTable extends Migration
{
    public function up()
    {
        Schema::create("high_scores", function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("email");
            $table->integer("score")->index();
        });
    }

    public function down()
    {
        Schema::drop("high_scores");
    }
}
