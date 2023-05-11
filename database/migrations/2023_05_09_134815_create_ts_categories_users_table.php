<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTsCategoriesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ts_categories_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->string();
            $table->integer('percent')->nullable();

            $table->integer('ts_category_id')->nullable()->unsigned()->index();
            $table->integer('user_id')->nullable()->unsigned()->index();

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('ts_category_id')->references('id')->on('ts_categories')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ts_categories_users');
    }
}
