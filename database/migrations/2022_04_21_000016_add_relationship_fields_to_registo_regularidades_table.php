<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRegistoRegularidadesTable extends Migration
{
    public function up()
    {
        Schema::table('registo_regularidades', function (Blueprint $table) {
            $table->unsignedBigInteger('grupo_id')->nullable();
            $table->foreign('grupo_id', 'grupo_fk_6473078')->references('id')->on('grupos');
            $table->unsignedBigInteger('equipa_id')->nullable();
            $table->foreign('equipa_id', 'equipa_fk_6473079')->references('id')->on('equipas');
        });
    }
}
