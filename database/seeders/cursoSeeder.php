<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Grado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $novatos = Grado::where('Nombre', 'Novatos')->first();
        $expertos = Grado::where('Nombre', 'Expertos')->first();

        $curso = new Curso();
        $curso->Nombre = "Principiante I";
        $curso->Duracion = "50";
        $curso->Id_Grado = $novatos->Id_Grado;
        $curso->save();

        $curso2 = new Curso();
        $curso2->Nombre = "Principiante II";
        $curso2->Duracion = "60";
        $curso2->Id_Grado = $novatos->Id_Grado;
        $curso2->save();

        $curso3 = new Curso();
        $curso3->Nombre = "Avanzado I";
        $curso3->Duracion = "70";
        $curso3->Id_Grado = $expertos->Id_Grado;
        $curso3->save();

        $curso4 = new Curso();
        $curso4->Nombre = "Avanzado II";
        $curso4->Duracion = "80";
        $curso4->Id_Grado = $expertos->Id_Grado;
        $curso4->save();
    }
}
