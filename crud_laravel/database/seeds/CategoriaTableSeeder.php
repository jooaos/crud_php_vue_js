<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria')->insert(
            [
                ['codigo' => 1, 'nome' => 'Admin'],
                ['codigo' => 2, 'nome' => 'Gerente'],
                ['codigo' => 3, 'nome' => 'Normal']
            ]
        );
    }
}
