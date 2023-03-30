<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQzQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qz_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question')->nullable();
            $table->integer('quiz_id')->nullable()->unsigned()->index();
            $table->text('comments')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qz_questions');
    }
}
