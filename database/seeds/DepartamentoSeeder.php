<?php

use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $depto=new Departamento();
        $depto->nombre="VALLE";
        $depto->save();

        $depto=new Departamento();
        $depto->nombre="CUNDINAMARCA";
        $depto->save();

        $depto=new Departamento();
        $depto->nombre="ANTIOQUIA";
        $depto->save();
    }
}
