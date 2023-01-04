<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tabla para para devoluciones
        Schema::create('refunds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->nullable();
            $table->integer('user_id')->nullable()->unsigned()->index();
            $table->integer('order_id')->nullable()->unsigned()->index();
            #$table->integer('type_user')->nullable();//1 = mentor || 0 = usuario asesorado
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refunds');
    }
}
