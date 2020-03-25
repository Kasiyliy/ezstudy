<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id', 'fk_quiz_results_users')
                ->references('id')
                ->on('users');

            $table->unsignedBigInteger('quiz_id')->nullable(false);
            $table->foreign('quiz_id', 'fk_quiz_results_quizzes')
                ->references('id')
                ->on('quizzes');

            $table->double('result');

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
        Schema::dropIfExists('quiz_results');
    }
}
