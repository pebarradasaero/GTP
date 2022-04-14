<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipasTable extends Migration
{
    public function up()
    {
        Schema::create('equipas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
