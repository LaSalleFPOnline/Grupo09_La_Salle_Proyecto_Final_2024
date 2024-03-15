<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('Partidos', function (Blueprint $table) {
            $table->idPartido();
            $table->unsignedSmallInteger('idTemporada');
            $table->string('EquipoLocal');
            $table->string('EquipoVisitante');
            $table->unsignedSmallInteger('GolesEquipoLocal');
            $table->unsignedSmallInteger('GolesEquipoVisitante');
            $table->date('Fecha');
            $table->time('Hora');
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
