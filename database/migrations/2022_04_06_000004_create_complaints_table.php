<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numar_intrare');
            $table->date('data_intrare');
            $table->string('modul_preluare');
            $table->string('localitate');
            $table->string('reclamant');
            $table->string('tip_client');
            $table->string('tip_document');
            $table->string('continut');
            $table->string('concluzia_analizarii');
            $table->string('masuri');
            $table->date('termen');
            $table->string('date_contact');
            $table->string('responsabil');
            $table->string('raspuns')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
