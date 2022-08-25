<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->nullable();
            $table->integer('status')->nullable();
            $table->integer('synced')->nullable();

            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mail_corporate')->nullable();
            $table->string('mail_personal')->nullable();
            $table->string('movil')->nullable();
            $table->string('telephone')->nullable();
            $table->string('company')->nullable();
            $table->string('interests')->nullable();

            $table->string('form')->nullable();
            $table->text('url')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }
    /*
        verificar si creamos tablas para las utm  o creamos columnas en la misma tabla: utm_source, utm_medium, utm_campaign, utm_term, utm_content
    */
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}




