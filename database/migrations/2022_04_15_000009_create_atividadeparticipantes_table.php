<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtividadeparticipantesTable extends Migration
{
    public function up()
    {
        Schema::create('atividadeparticipantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('petisco');
            $table->string('bebida');
            $table->string('atividade');
            $table->integer('regularidade1');
            $table->integer('regularidade1');
            $table->timestamp('checkin');
            $table->timestamp('checkout');
            $table->integer('senhasaida');
            $table->timestamps();
        });
    }
}
