<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQzAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qz_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned()->index();
            $table->integer('quiz_id')->nullable()->unsigned()->index();
            $table->integer('question_id')->nullable()->unsigned()->index();
            $table->integer('option_id')->nullable()->unsigned()->index();
            //$table->string('name')->nullable();
            //$table->text('comments')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('quiz_id')->references('id')->on('companies')->onDelete('set null');
            $table->foreign('question_id')->references('id')->on('qz_questions')->onDelete('set null');
            $table->foreign('option_id')->references('id')->on('qz_options')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qz_answers');
    }
}
