<?php

namespace Database\Factories;

use App\Models\Catedratico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Catedratico>
 */
class CatedraticoFactory extends Factory
{
    protected $model = Catedratico::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "Codigo_Catedratico" => $this->faker->unique()->numberBetween(10000000,999999999),
            "Nombre" =>$this->faker->name,
            "Correo" =>$this->faker->safeEmail,
            "Telefono" =>$this->faker->unique()->numberBetween(10000000,999999999999)
        ];
    }
}
