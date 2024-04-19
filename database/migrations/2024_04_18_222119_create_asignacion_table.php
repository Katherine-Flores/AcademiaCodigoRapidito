<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asignacion', function (Blueprint $table) {
            $table->id("Id_Asignacion");
            $table->date("Fecha_Asignacion");
            $table->unsignedBigInteger("Id_Curso");
            $table->foreign("Id_Curso")->references("Id_Curso")->on("curso")->onDelete("cascade");
            $table->unsignedBigInteger("Codigo_Catedratico");
            $table->foreign("Codigo_Catedratico")->references("Codigo_Catedratico")->on("catedratico")->onDelete("cascade");
            $table->unsignedBigInteger("Id_Sucursal");
            $table->foreign("Id_Sucursal")->references("Id_Sucursal")->on("sucursal")->onDelete("cascade");
            $table->unsignedBigInteger("Id_Grado");
            $table->foreign("Id_Grado")->references("Id_Grado")->on("grado")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignacion');
    }
};
