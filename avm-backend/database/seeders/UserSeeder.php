<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_types_id' => 1,
                'name' => 'Coordinador',
                'email' => 'test.coordinator@valuaciones.cl',
                'email_verified_at' => now(),
                'rut' => null,
                'password' => Hash::make('qwerty123'),
                'phone' => '958977661',
                'remember_token' => null,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'user_types_id' => 3,
                'name' => 'Don Juan 217',
                'email' => 'don.juan@valuaciones.cl',
                'email_verified_at' => now(),
                'rut' => '77164602-6',
                'phone' => '958977661',
                'password' => null,
                'remember_token' => null,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'user_types_id' => 3,
                'name' => 'Mauricio',
                'email' => 'mauricio.acuna@valuaciones.cl',
                'email_verified_at' => now(),
                'rut' => '19350720-4',
                'phone' => '968977661',
                'password' => null,
                'remember_token' => null,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'user_types_id' => 2,
                'name' => 'Supervisor',
                'email' => 'test.supervisor@valuaciones.cl',
                'email_verified_at' => now(),
                'rut' => null,
                'password' => Hash::make('qwerty123'),
                'phone' => '958977661',
                'remember_token' => null,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => null,
            ],
            [
                'user_types_id' => 2,
                'name' => 'Valuaciones',
                'email' => 'admin@valuaciones.cl',
                'email_verified_at' => now(),
                'rut' => null,
                'password' => Hash::make('qwerty123'),
                'phone' => '999999999',
                'remember_token' => null,
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => null,
            ]
        ];
        DB::table('users')->insert($data);
    }
}
