<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAtividadeparticipantesTable extends Migration
{
    public function up()
    {
        Schema::table('atividadeparticipantes', function (Blueprint $table) {
            $table->unsignedBigInteger('jf_id')->nullable();
            $table->foreign('jf_id', 'jf_fk_6428674')->references('id')->on('juntas_freguesia');
            $table->unsignedBigInteger('grupo_id')->nullable();
            $table->foreign('grupo_id', 'grupo_fk_6428675')->references('id')->on('grupos');
            $table->unsignedBigInteger('equipa_id')->nullable();
            $table->foreign('equipa_id', 'equipa_fk_6428676')->references('id')->on('equipas');
        });
    }
}
