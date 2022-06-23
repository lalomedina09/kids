<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailables', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('mailable');
            $table->string('mailable_class');
            $table->datetime('delete_at')->nullable();
            $table->timestamps();

            $table->unique(['mailable_class', 'mailable_id', 'mailable_type'], 'class_mailable');
        });

        Schema::table('mailables', function (Blueprint $table) {
            $table->string('mailable_type')->nullable()->index()->change();
            $table->integer('mailable_id')->nullable()->unsigned()->index()->change();
            $table->string('mailable_class')->nullable()->index()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailables');
    }
}
