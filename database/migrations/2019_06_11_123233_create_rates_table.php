<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 100);
            $table->string('comment', 2000)->nullable();
            $table->tinyInteger('rate')->default(0);
            $table->integer('user_id')->nullable()->unsigned()->index();
            $table->morphs('rateable');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->unique(['user_id', 'rateable_id', 'rateable_type'], 'user_rateable');
        });

        Schema::table('rates', function (Blueprint $table) {
            $table->string('rateable_type')->nullable()->index()->change();
            $table->integer('rateable_id')->nullable()->unsigned()->index()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
