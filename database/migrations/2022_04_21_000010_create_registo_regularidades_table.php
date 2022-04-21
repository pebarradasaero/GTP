<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistoRegularidadesTable extends Migration
{
    public function up()
    {
        Schema::create('registo_regularidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('regularidade_1');
            $table->string('regularidade_2');
            $table->timestamps();
        });
    }
}
