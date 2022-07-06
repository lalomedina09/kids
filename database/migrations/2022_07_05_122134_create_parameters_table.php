<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code')->nullable()->unique()->index();
            $table->string('lang')->nullable()->unique();
            $table->nestedSet();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('parameters', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('parameters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parameters', function (Blueprint $table) {
            $table->dropNestedSet();
        });
        Schema::dropIfExists('parameters');
    }

    /*
    Notas para primer insercion

    INSERT INTO `queridodinero`.`parameters` (`name`, `code`, `created_at`, `updated_at`)
        VALUES ('Root', 'root-parameters', '2022-07-05 09:00:00', '2022-07-05 09:00:00');
    INSERT INTO `queridodinero`.`parameters` (`name`, `code`, `created_at`, `updated_at`)
        VALUES ('Main', 'main-parameters', '2022-07-05 09:00:00', '2022-07-05 09:00:00');
    INSERT INTO `queridodinero`.`parameters` (`name`, `code`, `_lft`, `_rgt`, `created_at`, `updated_at`)
        VALUES ('Control de precios', 'marketplace', '100', '900', '2022-07-05 09:00:00', '2022-07-05 09:00:00');

    */
}
