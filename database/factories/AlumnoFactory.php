<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    protected $model = Alumno::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "Codigo_Alumno" => $this->faker->unique()->numberBetween(10000000, 999999999),
            "Nombre" => $this->faker->name,
            "Correo" => $this->faker->safeEmail,
            "Telefono" => $this->faker->unique()->numberBetween(10000000, 999999999999),
            "Fecha_Nacimiento" => $this->faker->dateTimeBetween('-20 years', '-18 years')->format('Y-m-d')
        ];
    }
}
