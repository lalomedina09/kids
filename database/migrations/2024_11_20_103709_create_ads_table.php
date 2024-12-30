<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable(); // Título del anuncio
            $table->text('content'); // Contenido del anuncio
            $table->string('background_color')->default('#000'); // Color de fondo
            $table->boolean('has_countdown')->default(false); // Indica si tiene contador
            $table->timestamp('start_date')->nullable(); // Fecha de inicio
            $table->timestamp('end_date')->nullable(); // Fecha de fin
            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
