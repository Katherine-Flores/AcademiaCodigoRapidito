<?php

namespace Database\Seeders;

use App\Models\Grado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class gradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grado = new Grado();
        $grado->Nombre = "Novatos";
        $grado->save();

        $grado2 = new Grado();
        $grado2->Nombre = "Expertos";
        $grado2->save();
    }
}
