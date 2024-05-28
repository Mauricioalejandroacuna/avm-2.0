<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Tarapaca',
            ],
            [
                'name' => 'Antofagasta',
            ],
            [
                'name' => 'Atacama',
            ],
            [
                'name' => 'Coquimbo',
            ],
            [
                'name' => 'Valparaiso',
            ],
            [
                'name' => 'O Higgins',
            ],
            [
                'name' => 'El Maule',
            ],
            [
                'name' => 'El Biobio',
            ],
            [
                'name' => 'La Araucania',
            ],
            [
                'name' => 'Los Lagos',
            ],
            [
                'name' => 'Aysen',
            ],
            [
                'name' => 'Magallanes y Antartica Chilena',
            ],
            [
                'name' => 'Metropolitana',
            ],
            [
                'name' => 'Los Rios',
            ],
            [
                'name' => 'Arica y Parinacota',
            ],
            [
                'name' => 'Ñuble',
            ],
        ];
        DB::table('regions')->insert($data);
    }
}
