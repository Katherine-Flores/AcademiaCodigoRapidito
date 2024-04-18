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
        Schema::create('catedratico', function (Blueprint $table) {
            $table->id("Codigo_Catedratico");
            $table->string("Nombre",125);
            $table->string("Correo")->unique();
            $table->string("Telefono", 12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catedratico');
    }
};
