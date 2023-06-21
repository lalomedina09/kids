<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableTsCategoryUserAddColumnComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ts_categories_users', function (Blueprint $table) {
            $table->string('comments')->nullable()->after('created_by_app');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ts_categories_users', function (Blueprint $table) {
            $table->dropColumn('comments');
        });
    }
}
