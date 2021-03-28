<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeoPaisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo_paises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('nome_en');
            $table->string('sigla', 3);
            $table->integer('bacen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('geo_paises');
    }
}
