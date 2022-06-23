<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code')->nullable()->unique()->index();
            $table->string('lang')->nullable()->unique();
            $table->nestedSet();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('options', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('options', function (Blueprint $table) {
            $table->dropNestedSet();
        });
        Schema::dropIfExists('options');
    }
}
