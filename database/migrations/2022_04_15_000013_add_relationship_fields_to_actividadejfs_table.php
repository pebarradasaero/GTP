<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToActividadejfsTable extends Migration
{
    public function up()
    {
        Schema::table('actividadejfs', function (Blueprint $table) {
            $table->unsignedBigInteger('jf_id')->nullable();
            $table->foreign('jf_id', 'jf_fk_6428656')->references('id')->on('juntas_freguesia');
            $table->unsignedBigInteger('grupo_id')->nullable();
            $table->foreign('grupo_id', 'grupo_fk_6428657')->references('id')->on('grupos');
            $table->unsignedBigInteger('equipa_id')->nullable();
            $table->foreign('equipa_id', 'equipa_fk_6428658')->references('id')->on('equipas');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_6438168')->references('id')->on('users');
        });
    }
}
