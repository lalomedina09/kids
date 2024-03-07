<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUserAgentsAddColumnIp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_agents', function (Blueprint $table) {
            $table->string('ip')->nullable()->after('user_id');
            $table->string('languages')->nullable()->after('user_agent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_agents', function (Blueprint $table) {
            $table->dropColumn('ip');
            $table->dropColumn('languages');
        });
    }
}
