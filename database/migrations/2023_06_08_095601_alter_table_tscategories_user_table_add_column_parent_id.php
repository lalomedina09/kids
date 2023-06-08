<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableTscategoriesUserTableAddColumnParentId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ts_categories_users', function (Blueprint $table) {
            $table->integer('parent_id')->nullable()->unsigned()->index()->after('ts_category_id');
        });

        Schema::table('ts_categories_users', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('ts_categories')->onDelete('cascade');
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
            $table->dropColumn('parent_id');
        });
    }
}
