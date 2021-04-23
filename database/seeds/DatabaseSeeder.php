<?php

use Illuminate\Database\Seeder;
use App\Departamento;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(DepartamentoSeeder::class);
    }
}
