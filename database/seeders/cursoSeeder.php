<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class cursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $curso = new Curso();
        $curso->Nombre = "Principiante I";
        $curso->Duracion = "50";
        $curso->save();

        $curso2 = new Curso();
        $curso2->Nombre = "Principiante II";
        $curso2->Duracion = "60";
        $curso2->save();

        $curso3 = new Curso();
        $curso3->Nombre = "Avanzado I";
        $curso3->Duracion = "70";
        $curso3->save();

        $curso4 = new Curso();
        $curso4->Nombre = "Avanzado II";
        $curso4->Duracion = "80";
        $curso4->save();
    }
}
