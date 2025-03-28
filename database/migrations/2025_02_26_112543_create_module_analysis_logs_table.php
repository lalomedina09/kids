<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleAnalysisLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_analysis_logs', function (Blueprint $table) {
            $table->increments('id');                                    
            $table->string('module_name')->nullable();// Nombre del módulo que se está analizando                        
            $table->string('status')->nullable();// Estado del análisis (éxito, error, advertencia)                        
            $table->text('message')->nullable();// Mensaje descriptivo sobre el análisis                        
            $table->string('error_code')->nullable();// Código de error (si aplica)                        
            $table->json('additional_data')->nullable();// Datos adicionales en formato JSON                        
            $table->float('execution_time')->nullable();// Tiempo de ejecución del análisis                        
            $table->timestamp('analysis_time')->nullable();// Fecha y hora del análisis                        
            $table->timestamps();// Timestamps estándar (created_at y updated_at)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_analysis_logs');
    }
}
