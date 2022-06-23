<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('body');
            $table->string('excerpt')->nullable();
            $table->string('url', 1000);
            $table->datetime('published_at')->nullable();
            $table->integer('author_id')->nullable()->unsigned()->index();
            $table->bigInteger('views_count')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('author_id')->references('id')->on('users')->onDelete('set null');
        });

        DB::statement('ALTER TABLE videos ADD FULLTEXT fulltext_index (title, excerpt)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
