<?php

namespace Database\Factories;

use App\Models\Factura;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacturaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Factura::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           
            'codigo'=>$this->faker->unique()->numerify($string="########"),
            'proveedor'=>$this->faker->randomElement(['TP-LINK','CISCO']),
            'fecha'=>$this->faker->date(),
            'descripcion'=>$this->faker->text($maxNbChars=50),
         ];
    }
}
