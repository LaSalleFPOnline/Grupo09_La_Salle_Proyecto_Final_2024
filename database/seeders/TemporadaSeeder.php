<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Temporada;

class TemporadaSeeder extends Seeder
{
    public function run()
    {
        Temporada::create([
            'AnioInicio' => '2021',
            'AnioFin' => '2022'
        ]);

        Temporada::create([
            'AnioInicio' => '2022',
            'AnioFin' => '2023'
        ]);
    }
}