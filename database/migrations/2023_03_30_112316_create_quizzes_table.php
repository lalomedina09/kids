<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->integer('type')->nullable();
            $table->text('comments')->nullable();

            $table->morphs('quizzesable');
            $table->timestamps();
            $table->softDeletes();

            //$table->integer('qdp_courses_id')->nullable()->unsigned()->index();
            //$table->foreign('qdp_courses_id')->references('id')->on('qdp_courses')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}
