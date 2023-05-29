<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTsBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ts_budgets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_move')->nullable();
            $table->decimal('amount_real', 10, 2)->default(0.00);
            $table->decimal('amount_estimated', 10, 2)->default(0.00);

            $table->integer('ts_category_user_id')->nullable()->unsigned()->index();
            $table->integer('user_id')->nullable()->unsigned()->index();

            $table->timestamps();
            $table->softDeletes();
            $table->foreign('ts_category_user_id')->references('id')->on('ts_categories_users')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ts_budgets');
    }
}
