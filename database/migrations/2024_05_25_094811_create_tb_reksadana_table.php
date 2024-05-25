<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbReksadanaTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_reksadana', function (Blueprint $table) {
            $table->increments('no');
            $table->string('ReksaDanaID');
            $table->string('NamaRD');
            $table->string('Jenis');
            $table->integer('NAV');
            $table->integer('AUM');
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
        Schema::drop('tb_reksadana');
    }
}
