<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ts_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('name')->string();
            $table->string('code')->nullable()->unique()->index();
            $table->string('lang')->nullable()->unique();
            $table->nestedSet();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('ts_categories', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('ts_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropNestedSet();
        });

        Schema::dropIfExists('ts_categories');
    }
}
