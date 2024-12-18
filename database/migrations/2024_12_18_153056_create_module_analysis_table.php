<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleAnalysisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_analysis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('module_name');
            $table->string('status'); // OK, Warning, Error
            $table->float('execution_time'); // En segundos
            $table->string('batch_id'); // Identificar el grupo o lote
            $table->timestamp('analyzed_at'); // Fecha y hora del análisis
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_analysis');
    }
}
