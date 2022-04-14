<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuntasFreguesiaTable extends Migration
{
    public function up()
    {
        Schema::create('juntas_freguesia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('localidade')->nullable();
            $table->timestamps();
        });
    }
}
