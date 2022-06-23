<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('title');
            $table->string('subtitle');
            $table->longText('body');
            $table->string('excerpt')->nullable();
            $table->string('city')->nullable();
            $table->string('venue')->nullable();
            $table->string('address')->nullable();
            $table->string('enrollment_url')->nullable();
            $table->string('webinar_id')->nullable();
            $table->string('webinar_password')->nullable();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->boolean('online_sell')->default(0);
            $table->boolean('featured')->default(0);
            $table->datetime('start_event')->nullable();
            $table->datetime('end_event')->nullable();
            $table->datetime('published_at')->nullable();
            $table->integer('category_id')->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        DB::statement('ALTER TABLE courses ADD FULLTEXT fulltext_index (title, subtitle, excerpt)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
