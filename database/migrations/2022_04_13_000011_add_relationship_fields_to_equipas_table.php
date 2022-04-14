<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEquipasTable extends Migration
{
    public function up()
    {
        Schema::table('equipas', function (Blueprint $table) {
            $table->unsignedBigInteger('grupo_id')->nullable();
            $table->foreign('grupo_id', 'grupo_fk_6428666')->references('id')->on('grupos');
        });
    }
}
