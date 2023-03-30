<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQzOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qz_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->nullable();
            $table->integer('is_correct')->nullable();
            $table->string('option')->nullable();
            $table->integer('question_id')->nullable()->unsigned()->index();
            $table->text('comments')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('question_id')->references('id')->on('qz_questions')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qz_options');
    }
}
