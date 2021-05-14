<?php

namespace Database\Factories;

use App\Models\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Unique;

class EquipoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipoequipo_id'=>$this->faker->numerify(1),
            'codigo'=>$this->faker->unique()->numerify($string="########"),
            'serial'=>$this->faker->unique()->numerify($string="########"),
            'mac'=>$this->faker->unique()->numerify($string="##########"),
            'estado'=>$this->faker->randomElement(['nuevo','usuado']),
            'observacion'=>$this->faker->text($maxNbChars=50),
            'destino'=>$this->faker->randomElement(['bodega','nodo']),
            'fecha'=>$this->faker->date(),
         ];
    }
}
