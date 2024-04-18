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
        Schema::create('inscripcion', function (Blueprint $table) {
            $table->id("Id_Inscripcion");
            $table->unsignedBigInteger("Codigo_Alumno");
            $table->foreign("Codigo_Alumno")->references("Codigo_Alumno")->on("alumno")->onDelete("cascade");
            $table->unsignedBigInteger("Id_Asignacion");
            $table->foreign("Id_Asignacion")->references("Id_Asignacion")->on("asignacion")->onDelete("cascade");
            $table->date("Fecha_Inscripcion");
            $table->float("Monto");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripcion');
    }
};
