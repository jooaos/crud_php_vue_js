<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Pessoas')->insert(
            [
                [
                    'codigo' => 1,
                    'nome_usuario' => 'Jorge da Silva',
                    'email_usuario' => 'jorge@terra.com.br',
                    'fk_categoria_id' =>  1
                ],
                [
                    'codigo' => 2,
                    'nome_usuario' => 'Flavia Monteiro',
                    'email_usuario' => 'flavia@globo.com',
                    'fk_categoria_id' =>  2
                ],
                [
                    'codigo' => 3,
                    'nome_usuario' => 'Marcos Frota Ribeiro',
                    'email_usuario' => 'ribeiro@gmail.com',
                    'fk_categoria_id' =>  2
                ],
                [
                    'codigo' => 4,
                    'nome_usuario' => 'Raphael Souza Santos',
                    'email_usuario' => 'rsantos@gmail.com',
                    'fk_categoria_id' =>  1
                ],
                [
                    'codigo' => 5,
                    'nome_usuario' => 'Pedro Paulo Mota',
                    'email_usuario' => 'ppmota@gmail.com',
                    'fk_categoria_id' =>  1
                ],
                [
                    'codigo' => 6,
                    'nome_usuario' => 'Winder Carvalho da Silva',
                    'email_usuario' => 'winder@hotmail.com',
                    'fk_categoria_id' =>  3
                ],
                [
                    'codigo' => 7,
                    'nome_usuario' => 'Maria da Penha Albuquerque',
                    'email_usuario' => 'mpa@hotmail.com',
                    'fk_categoria_id' =>  3
                ],
                [
                    'codigo' => 8,
                    'nome_usuario' => 'Rafael Garcia Souza',
                    'email_usuario' => 'rgsouza@hotmail.com',
                    'fk_categoria_id' =>  3
                ],
                [
                    'codigo' => 9,
                    'nome_usuario' => 'Tabata Costa',
                    'email_usuario' => 'tabata_costa@gmail.com ',
                    'fk_categoria_id' =>  2
                ],
                [
                    'codigo' => 10,
                    'nome_usuario' => 'Ronil Camarote',
                    'email_usuario' => 'camarote@terra.com.br',
                    'fk_categoria_id' =>  1
                ],
                [
                    'codigo' => 11,
                    'nome_usuario' => 'Joaquim Barbosa',
                    'email_usuario' => 'barbosa@globo.com',
                    'fk_categoria_id' =>  1
                ],
                [
                    'codigo' => 12,
                    'nome_usuario' => 'Eveline Maria Alcantra',
                    'email_usuario' => 'ev_alcantra@gmail.com',
                    'fk_categoria_id' =>  2
                ],
                [
                    'codigo' => 13,
                    'nome_usuario' => 'João Paulo Vieira',
                    'email_usuario' => 'jpvieria@gmail.com',
                    'fk_categoria_id' =>  1
                ],
                [
                    'codigo' => 14,
                    'nome_usuario' => 'Carla Zamborlini',
                    'email_usuario' => 'zamborlini@terra.com.br',
                    'fk_categoria_id' =>  3
                ]
            ]
        );
    }
}
