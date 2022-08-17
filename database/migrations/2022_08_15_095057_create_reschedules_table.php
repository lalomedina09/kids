<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tabla para re - agendar
        Schema::create('reschedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->nullable();
            $table->integer('user_id')->nullable()->unsigned()->index();
            $table->integer('advice_id')->nullable()->unsigned()->index();
            $table->integer('type_user')->nullable();//1 = asesor || 0 = usuario asesorado
            $table->text('description')->nullable();
            $table->datetime('current_date')->nullable();
            $table->datetime('new_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('advice_id')->references('id')->on('advice')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
    */
    public function down()
    {
        Schema::dropIfExists('reschedules');
    }
}
