<?php

namespace Database\Seeders;

use App\Models\Sucursal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class sucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sucursal = new Sucursal();
        $sucursal->Nombre = "Morales";
        $sucursal->Direccion = "Losto Mates 22";
        $sucursal->Telefono = "44556699";
        $sucursal->save();

        $sucursal2 = new Sucursal();
        $sucursal2->Nombre = "Puerto Barrios";
        $sucursal2->Direccion = "Lace Bolla 33";
        $sucursal2->Telefono = "77889944";
        $sucursal2->save();

        $sucursal3 = new Sucursal();
        $sucursal3->Nombre = "El Estor";
        $sucursal3->Direccion = "laPa Pa 55";
        $sucursal3->Telefono = "99667733";
        $sucursal3->save();

        $sucursal4 = new Sucursal();
        $sucursal4->Nombre = "Los Amates";
        $sucursal4->Direccion = "Lale Chuga 12";
        $sucursal4->Telefono = "122123";
        $sucursal4->save();
    }
}
