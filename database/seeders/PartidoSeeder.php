<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partido;
use App\Models\Temporada;

class PartidoSeeder extends Seeder
{
    public function run()
    {
        $temporada = Temporada::where('AnioInicio', '2021')->first();

        Partido::create([
            'EquipoLocal' => 'Real Madrid',
            'EquipoVisitante' => 'Barcelona',
            'GolesEquipoLocal' => 0,
            'GolesEquipoVisitante' => 5,
            'Fecha' => '2021-10-23',
            'Hora' => '20:00:00',
            'idTemporada' => $temporada->idTemporada
        ]);

        Partido::create([
            'EquipoLocal' => 'Atlético de Madrid',
            'EquipoVisitante' => 'Sevilla',
            'GolesEquipoLocal' => 3,
            'GolesEquipoVisitante' => 0,
            'Fecha' => '2021-10-24',
            'Hora' => '18:00:00',
            'idTemporada' => $temporada->idTemporada
        ]);

        $temporada = Temporada::where('AnioInicio', '2022')->first();

        Partido::create([
            'EquipoLocal' => 'Barcelona',
            'EquipoVisitante' => 'Real Madrid',
            'GolesEquipoLocal' => 5,
            'GolesEquipoVisitante' => 0,
            'Fecha' => '2022-02-27',
            'Hora' => '21:00:00',
            'idTemporada' => $temporada->idTemporada
        ]);

        Partido::create([
            'EquipoLocal' => 'Sevilla',
            'EquipoVisitante' => 'Atlético de Madrid',
            'GolesEquipoLocal' => 1,
            'GolesEquipoVisitante' => 2,
            'Fecha' => '2022-02-23',
            'Hora' => '19:00:00',
            'idTemporada' => $temporada->idTemporada
        ]);
    }
}
