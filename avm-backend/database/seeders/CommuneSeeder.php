<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'regions_id' => 15,
                'code_commune' => 1101,
                'name' => 'Arica',
            ],
            [
                'regions_id' => 15,
                'code_commune' => 1106,
                'name' => 'Camarones',
            ],
            [
                'regions_id' => 15,
                'code_commune' => 1302,
                'name' => 'General Lagos',
            ],
            [
                'regions_id' => 15,
                'code_commune' => 1301,
                'name' => 'Putre',
            ],
            [
                'regions_id' => 1,
                'code_commune' => 1211,
                'name' => 'Alto Hospicio',
            ],
            [
                'regions_id' => 1,
                'code_commune' => 1208,
                'name' => 'Camina',
            ],
            [
                'regions_id' => 1,
                'code_commune' => 1210,
                'name' => 'Colchane',
            ],
            [
                'regions_id' => 1,
                'code_commune' => 1206,
                'name' => 'Huara',
            ],
            [
                'regions_id' => 1,
                'code_commune' => 1201,
                'name' => 'Iquique',
            ],
            [
                'regions_id' => 1,
                'code_commune' => 1203,
                'name' => 'Pica',
            ],
            [
                'regions_id' => 1,
                'code_commune' => 1204,
                'name' => 'Pozo Almonte',
            ],
            [
                'regions_id' => 2,
                'code_commune' => 2201,
                'name' => 'Antofagasta',
            ],
            [
                'regions_id' => 2,
                'code_commune' => 2301,
                'name' => 'Calama',
            ],
            [
                'regions_id' => 2,
                'code_commune' => 2103,
                'name' => 'Maria Elena',
            ],
            [
                'regions_id' => 2,
                'code_commune' => 2203,
                'name' => 'Mejillones',
            ],

            [
                'regions_id' => 2,
                'code_commune' => 2302,
                'name' => 'Ollague',
            ],
            [
                'regions_id' => 2,
                'code_commune' => 2303,
                'name' => 'San Pedro de Atacama',
            ],
            [
                'regions_id' => 2,
                'code_commune' => 2206,
                'name' => 'Sierra Gorda',
            ],
            [
                'regions_id' => 2,
                'code_commune' => 2202,
                'name' => 'Taltal',
            ],
            [
                'regions_id' => 2,
                'code_commune' => 2101,
                'name' => 'Tocopilla',
            ],
            [
                'regions_id' => 3,
                'code_commune' => 3304,
                'name' => 'Alto del Carmen',
            ],
            [
                'regions_id' => 3,
                'code_commune' => 3202,
                'name' => 'Caldera',
            ],
            [
                'regions_id' => 3,
                'code_commune' => 3101,
                'name' => 'Chanaral',
            ],
            [
                'regions_id' => 3,
                'code_commune' => 3201,
                'name' => 'Copiapo',
            ],
            [
                'regions_id' => 3,
                'code_commune' => 3102,
                'name' => 'Diego de Almagro',
            ],
            [
                'regions_id' => 3,
                'code_commune' => 3302,
                'name' => 'Freirina',
            ],
            [
                'regions_id' => 3,
                'code_commune' => 3303,
                'name' => 'Huasco',
            ],
            [
                'regions_id' => 3,
                'code_commune' => 3203,
                'name' => 'Tierra Amarilla',
            ],
            [
                'regions_id' => 3,
                'code_commune' => 3301,
                'name' => 'Vallenar',
            ],
            [
                'regions_id' => 4,
                'code_commune' => 4104,
                'name' => 'Andacollo',
            ],
            [
                'regions_id' => 4,
                'code_commune' => 4304,
                'name' => 'Canela',
            ],
            [
                'regions_id' => 4,
                'code_commune' => 4205,
                'name' => 'Combarbala',
            ],
            [
                'regions_id' => 4,
                'code_commune' => 4103,
                'name' => 'Coquimbo',
            ],
            [
                'regions_id' => 4,
                'code_commune' => 4301,
                'name' => 'Illapel',
            ],
            [
                'regions_id' => 4,
                'code_commune' => 4102,
                'name' => 'La Higuera',
            ],
            [
                'regions_id' => 4,
                'code_commune' => 4101,
                'name' => 'La Serena',
            ],
            [
                'regions_id' => 4,
                'code_commune' => 4303,
                'name' => 'Los Vilos',
            ],
            [
                'regions_id' => 4,
                'code_commune' => 4203,
                'name' => 'Monte Patria',
            ],
            [
                'regions_id' => 4,
                'code_commune' => 4201,
                'name' => 'Ovalle',
            ],
            [
                'regions_id' => 4,
                'code_commune' => 4106,
                'name' => 'Paiguano',
            ],
            [
                'regions_id' => 4,
                'code_commune' => 4204,
                'name' => 'Punitaqui',
            ],
            [
                'regions_id' => 4,
                'code_commune' => 4206,
                'name' => 'Rio Hurtado',
            ],
            [
                'regions_id' => 4,
                'code_commune' => 4302,
                'name' => 'Salamanca',
            ],
            [
                'regions_id' => 4,
                'code_commune' => 4105,
                'name' => 'Vicuna',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5406,
                'name' => 'Algarrobo',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5203,
                'name' => 'Cabildo',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5502,
                'name' => 'Calera',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5702,
                'name' => 'Calle Larga',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5403,
                'name' => 'Cartagena',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5305,
                'name' => 'Casablanca',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5603,
                'name' => 'Catemu',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5309,
                'name' => 'Concon',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5405,
                'name' => 'El Quisco',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5404,
                'name' => 'El Tabo',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5503,
                'name' => 'Hijuelas',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5101,
                'name' => 'Isla de Pascua',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5308,
                'name' => 'Juan Fernandez',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5505,
                'name' => 'La Cruz',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5201,
                'name' => 'La Ligua',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5506,
                'name' => 'Limache',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5703,
                'name' => 'Llaillay',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5701,
                'name' => 'Los Andes',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5502,
                'name' => 'Nogales',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5507,
                'name' => 'Olmue',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5602,
                'name' => 'Panquehue',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5205,
                'name' => 'Papudo',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5202,
                'name' => 'Petorca',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5307,
                'name' => 'Puchuncavi',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5604,
                'name' => 'Putaendo',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5501,
                'name' => 'Quillota',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5304,
                'name' => 'Quilpue',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5306,
                'name' => 'Quintero',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5704,
                'name' => 'Rinconada',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5401,
                'name' => 'San Antonio',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5703,
                'name' => 'San Esteban',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5601,
                'name' => 'San Felipe',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5605,
                'name' => 'Santa Maria',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5402,
                'name' => 'Santo Domingo',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5301,
                'name' => 'Valparaiso',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5303,
                'name' => 'Villa Alemana',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5302,
                'name' => 'Vina del Mar',
            ],
            [
                'regions_id' => 5,
                'code_commune' => 5204,
                'name' => 'Zapallar',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14605,
                'name' => 'Alhue',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 16403,
                'name' => 'Buin',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 16402,
                'name' => 'Calera de Tango',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14166,
                'name' => 'Cerrillos',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14156,
                'name' => 'Cerro Navia',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14201,
                'name' => 'Colina',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14127,
                'name' => 'Conchali',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14603,
                'name' => 'Curacavi',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 16165,
                'name' => 'El Bosque',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14503,
                'name' => 'El Monte',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14157,
                'name' => 'Estacion Central',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14158,
                'name' => 'Huechuraba',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 13167,
                'name' => 'Independencia',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14502,
                'name' => 'Isla de Maipo',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 16110,
                'name' => 'La Cisterna',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 15128,
                'name' => 'La Florida',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 16131,
                'name' => 'La Granja',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 16154,
                'name' => 'La Pintana',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 15132,
                'name' => 'La Reina',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14202,
                'name' => 'Lampa',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 15108,
                'name' => 'Las Condes',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 15161,
                'name' => 'Lo Barnechea',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 16164,
                'name' => 'Lo Espejo',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14155,
                'name' => 'Lo Prado',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 15151,
                'name' => 'Macul',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14109,
                'name' => 'Maipu',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14602,
                'name' => 'Maria Pinto',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14601,
                'name' => 'Melipilla',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 15105,
                'name' => 'Ñuñoa',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14505,
                'name' => 'Padre Hurtado',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 16404,
                'name' => 'Paine',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 16162,
                'name' => 'Pedro Aguirre Cerda',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14504,
                'name' => 'Penaflor',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 15152,
                'name' => 'Penalolen',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 16302,
                'name' => 'Pirque',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 15103,
                'name' => 'Providencia',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14111,
                'name' => 'Pudahuel',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 16301,
                'name' => 'Puente Alto',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14114,
                'name' => 'Quilicura',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14107,
                'name' => 'Quinta Normal',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 13159,
                'name' => 'Recoleta',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14113,
                'name' => 'Renca',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 16401,
                'name' => 'San Bernardo',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 16163,
                'name' => 'San Joaquin',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 16303,
                'name' => 'San Jose de Maipo',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 16106,
                'name' => 'San Miguel',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14604,
                'name' => 'San Pedro',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 16153,
                'name' => 'San Ramon',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 13101,
                'name' => 'Santiago',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 14501,
                'name' => 'Talagante',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 13303,
                'name' => 'Tiltil',
            ],
            [
                'regions_id' => 13,
                'code_commune' => 15160,
                'name' => 'Vitacura',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6209,
                'name' => 'Chepica',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6202,
                'name' => 'Chimbarongo',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6107,
                'name' => 'Codegua',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6116,
                'name' => 'Coinco',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6106,
                'name' => 'Coltauco',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6105,
                'name' => 'Donihue',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6103,
                'name' => 'Graneros',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6304,
                'name' => 'La Estrella',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6109,
                'name' => 'Las Cabras',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6303,
                'name' => 'Litueche',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6206,
                'name' => 'Lolol',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6102,
                'name' => 'Machali',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6115,
                'name' => 'Malloa',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6204,
                'name' => 'Marchihue',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6110,
                'name' => 'Mostazal',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6203,
                'name' => 'Nancagua',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6302,
                'name' => 'Navidad',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6114,
                'name' => 'Olivar',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6207,
                'name' => 'Palmilla',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6306,
                'name' => 'Paredones',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6208,
                'name' => 'Peralillo',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6108,
                'name' => 'Peumo',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6111,
                'name' => 'Pichidegua',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6301,
                'name' => 'Pichilemu',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6204,
                'name' => 'Placilla',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6214,
                'name' => 'Pumanque',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6117,
                'name' => 'Quinta de Tilcoco',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6101,
                'name' => 'Rancagua',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6112,
                'name' => 'Rengo',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6113,
                'name' => 'Requinoa',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6201,
                'name' => 'San Fernando',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6110,
                'name' => 'San Vicente',
            ],
            [
                'regions_id' => 6,
                'code_commune' => 6205,
                'name' => 'Santa Cruz',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7401,
                'name' => 'Cauquenes',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7403,
                'name' => 'Chanco',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7303,
                'name' => 'Colbun',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7208,
                'name' => 'Constitucion',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7207,
                'name' => 'Curepto',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7101,
                'name' => 'Curico',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7209,
                'name' => 'Empedrado',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7107,
                'name' => 'Hualane',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7105,
                'name' => 'Licanten',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7301,
                'name' => 'Linares',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7304,
                'name' => 'Longavi',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7206,
                'name' => 'Maule',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7108,
                'name' => 'Molina',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7305,
                'name' => 'Parral',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7203,
                'name' => 'Pelarco',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7402,
                'name' => 'Pelluhue',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7205,
                'name' => 'Pencahue',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7104,
                'name' => 'Rauco',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7306,
                'name' => 'Retiro',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7204,
                'name' => 'Rio Claro',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7103,
                'name' => 'Romeral',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7109,
                'name' => 'Sagrada Familia',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7202,
                'name' => 'San Clemente',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7310,
                'name' => 'San Javier',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7210,
                'name' => 'San Rafael',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7201,
                'name' => 'Talca',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7102,
                'name' => 'Teno',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7106,
                'name' => 'Vichuquen',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7309,
                'name' => 'Villa Alegre',
            ],
            [
                'regions_id' => 7,
                'code_commune' => 7302,
                'name' => 'Yerbas Buenas',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8113,
                'name' => 'Bulnes',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8101,
                'name' => 'Chillan',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8121,
                'name' => 'Chillan Viejo',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8107,
                'name' => 'Cobquecura',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8120,
                'name' => 'Coelemu',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8103,
                'name' => 'Coihueco',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8118,
                'name' => 'El Carmen',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8105,
                'name' => 'Ninhue',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8110,
                'name' => 'Niquen',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8117,
                'name' => 'Pemuco',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8102,
                'name' => 'Pinto',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8106,
                'name' => 'Portezuelo',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8115,
                'name' => 'Quillon',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8104,
                'name' => 'Quirihue',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8119,
                'name' => 'Ranquil',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8109,
                'name' => 'San Carlos',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8111,
                'name' => 'San Fabian',
            ],
            [
                'regions_id' => 16,
                'code_commune' => 8114,
                'name' => 'San Ignacio',
            ],
            [
            'regions_id' => 16,
            'code_commune' => 8112,
            'name' => 'San Nicolas',
        ],
        [
            'regions_id' => 16,
            'code_commune' => 16207,
            'name' => 'Treguaco',
        ],
        [
            'regions_id' => 16,
            'code_commune' => 8116,
            'name' => 'Yungay',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8414,
            'name' => 'Alto Biobio',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8413,
            'name' => 'Antuco',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8301,
            'name' => 'Arauco',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8410,
            'name' => 'Cabrero',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8305,
            'name' => 'Canete',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8211,
            'name' => 'Chiguayante',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8201,
            'name' => 'Concepcion',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8306,
            'name' => 'Contulmo',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8207,
            'name' => 'Coronel',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8302,
            'name' => 'Curanilahue',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8204,
            'name' => 'Florida',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8212,
            'name' => 'Hualpen',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8203,
            'name' => 'Hualqui',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8403,
            'name' => 'Laja',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8303,
            'name' => 'Lebu',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8304,
            'name' => 'Los Alamos',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8401,
            'name' => 'Los Angeles',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8208,
            'name' => 'Lota',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8407,
            'name' => 'Mulchen',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8405,
            'name' => 'Nacimiento',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8406,
            'name' => 'Negrete',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8202,
            'name' => 'Penco',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8408,
            'name' => 'Quilaco',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8404,
            'name' => 'Quilleco',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8210,
            'name' => 'San Pedro de la Paz',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8411,
            'name' => 'San Rosendo',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8402,
            'name' => 'Santa Barbara',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8209,
            'name' => 'Santa Juana',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8206,
            'name' => 'Talcahuano',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8307,
            'name' => 'Tirua',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8205,
            'name' => 'Tome',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8412,
            'name' => 'Tucapel',
        ],
        [
            'regions_id' => 8,
            'code_commune' => 8409,
            'name' => 'Yumbel',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9101,
            'name' => 'Angol',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9209,
            'name' => 'Carahue',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9221,
            'name' => 'Cholchol',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9105,
            'name' => 'Collipulli',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9204,
            'name' => 'Cunco',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9110,
            'name' => 'Curacautin',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9218,
            'name' => 'Curarrehue',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9106,
            'name' => 'Ercilla',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9203,
            'name' => 'Freire',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9207,
            'name' => 'Galvarino',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9212,
            'name' => 'Gorbea',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9205,
            'name' => 'Lautaro',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9214,
            'name' => 'Loncoche',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9111,
            'name' => 'Lonquimay',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9103,
            'name' => 'Los Sauces',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9108,
            'name' => 'Lumaco',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9217,
            'name' => 'Melipeuco',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9208,
            'name' => 'Nueva Imperial',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9220,
            'name' => 'Padre Las Casas',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9206,
            'name' => 'Perquenco',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9211,
            'name' => 'Pitrufquen',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9216,
            'name' => 'Pucon',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9102,
            'name' => 'Puren',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9104,
            'name' => 'Renaico',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9210,
            'name' => 'Saavedra',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9201,
            'name' => 'Temuco',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9219,
            'name' => 'Teodoro Schmidt',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9213,
            'name' => 'Tolten',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9107,
            'name' => 'Traiguen',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9109,
            'name' => 'Victoria',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9202,
            'name' => 'Vilcun',
        ],
        [
            'regions_id' => 9,
            'code_commune' => 9215,
            'name' => 'Villarrica',
        ],
        [
            'regions_id' => 14,
            'code_commune' => 10106,
            'name' => 'Corral',
        ],
        [
            'regions_id' => 14,
            'code_commune' => 10105,
            'name' => 'Futrono',
        ],
        [
            'regions_id' => 14,
            'code_commune' => 10109,
            'name' => 'La Union',
        ],
        [
            'regions_id' => 14,
            'code_commune' => 10112,
            'name' => 'Lago Ranco',
        ],
        [
            'regions_id' => 14,
            'code_commune' => 10103,
            'name' => 'Lanco',
        ],
        [
            'regions_id' => 14,
            'code_commune' => 10104,
            'name' => 'Los Lagos',
        ],
        [
            'regions_id' => 14,
            'code_commune' => 10107,
            'name' => 'Mafil',
        ],
        [
            'regions_id' => 14,
            'code_commune' => 10102,
            'name' => 'Mariquina',
        ],
        [
            'regions_id' => 14,
            'code_commune' => 10110,
            'name' => 'Paillaco',
        ],
        [
            'regions_id' => 14,
            'code_commune' => 10108,
            'name' => 'Panguipulli',
        ],
        [
            'regions_id' => 14,
            'code_commune' => 10111,
            'name' => 'Rio Bueno',
        ],
        [
            'regions_id' => 14,
            'code_commune' => 10101,
            'name' => 'Valdivia',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10406,
            'name' => 'Ancud',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10309,
            'name' => 'Calbuco',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10401,
            'name' => 'Castro',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10501,
            'name' => 'Chaiten',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10402,
            'name' => 'Chonchi',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10302,
            'name' => 'Cochamo',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10410,
            'name' => 'Curaco de Velez',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10408,
            'name' => 'Dalcahue',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10304,
            'name' => 'Fresia',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10305,
            'name' => 'Frutillar',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10503,
            'name' => 'Futaleufu',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10502,
            'name' => 'Hualaihue',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10306,
            'name' => 'Llanquihue',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10308,
            'name' => 'Los Muermos',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10307,
            'name' => 'Maullin',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10201,
            'name' => 'Osorno',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10504,
            'name' => 'Palena',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10301,
            'name' => 'Puerto Montt',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10203,
            'name' => 'Puerto Octay',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10303,
            'name' => 'Puerto Varas',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10405,
            'name' => 'Puqueldon',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10206,
            'name' => 'Purranque',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10204,
            'name' => 'Puyehue',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10403,
            'name' => 'Queilen',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10404,
            'name' => 'Quellon',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10407,
            'name' => 'Quemchi',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10415,
            'name' => 'Quinchao',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10205,
            'name' => 'Rio Negro',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10207,
            'name' => 'San Juan de la Costa',
        ],
        [
            'regions_id' => 10,
            'code_commune' => 10202,
            'name' => 'San Pablo',
        ],
        [
            'regions_id' => 11,
            'code_commune' => 11101,
            'name' => 'Aysen',
        ],
        [
            'regions_id' => 11,
            'code_commune' => 11201,
            'name' => 'Chile Chico',
        ],
        [
            'regions_id' => 11,
            'code_commune' => 11102,
            'name' => 'Cisnes',
        ],
        [
            'regions_id' => 11,
            'code_commune' => 11301,
            'name' => 'Cochrane',
        ],
        [
            'regions_id' => 11,
            'code_commune' => 11401,
            'name' => 'Coyhaique',
        ],
        [
            'regions_id' => 11,
            'code_commune' => 11104,
            'name' => 'Guaitecas',
        ],
        [
            'regions_id' => 11,
            'code_commune' => 11402,
            'name' => 'Lago Verde',
        ],
        [
            'regions_id' => 11,
            'code_commune' => 11302,
            'name' => 'OHiggins',
        ],
        [
            'regions_id' => 11,
            'code_commune' => 11203,
            'name' => 'Rio Ibanez',
        ],
        [
            'regions_id' => 11,
            'code_commune' => 11303,
            'name' => 'Tortel',
        ],
        [
            'regions_id' => 12,
            'code_commune' => 88888,
            'name' => 'Antartica',
        ],
        [
            'regions_id' => 12,
            'code_commune' => 12401,
            'name' => 'Cabo de Hornos',
        ],
        [
            'regions_id' => 12,
            'code_commune' => 12206,
            'name' => 'Laguna Blanca',
        ],
        [
            'regions_id' => 12,
            'code_commune' => 12101,
            'name' => 'Natales',
        ],
        [
            'regions_id' => 12,
            'code_commune' => 12301,
            'name' => 'Porvenir',
        ],
        [
            'regions_id' => 12,
            'code_commune' => 12302,
            'name' => 'Primavera',
        ],
        [
            'regions_id' => 12,
            'code_commune' => 12205,
            'name' => 'Punta Arenas',
        ],
        [
            'regions_id' => 12,
            'code_commune' => 12202,
            'name' => 'Rio Verde',
        ],
        [
            'regions_id' => 12,
            'code_commune' => 12204,
            'name' => 'San Gregorio',
        ],
        [
            'regions_id' => 12,
            'code_commune' => 12304,
            'name' => 'Timaukel',
        ],
        [
            'regions_id' => 12,
            'code_commune' => 12103,
            'name' => 'Torres del Paine',
        ],
    ];
    DB::table('communes')->insert($data);
    }
}
