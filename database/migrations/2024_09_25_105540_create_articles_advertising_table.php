<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesAdvertisingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_advertising', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->nullable()->unsigned()->index();
            $table->integer('updated_by')->nullable()->unsigned()->index();
            $table->string('cover_desktop')->nullable();
            $table->string('cover_movil')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->dateTime('published_at_expired')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles_advertising');
    }
}
