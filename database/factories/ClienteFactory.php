<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // sentence oracion
        //paragraph parrafo
        return [
           'ced'=>$this->faker->unique()->numerify($string="##########"),
           'nombre'=>$this->faker->name,
           'telefono'=>$this->faker->phoneNumber,
           'correo'=>$this->faker->unique()->safeEmail,
           'municipio'=>$this->faker->randomElement(['chinacota','los patios','bochalema','durania']),
           'calle'=>$this->faker->address,
           'estrato'=>$this->faker->randomElement(['1','2','4','6']),
           'fecha_inicio'=>$this->faker->date(),
           'fecha_final'=>$this->faker->date(),
           'tipo_servicio'=>$this->faker->randomElement(['canal dedicado','red de datos','canal con reuso','cableado estructurado','cctv','outsourcing']),
           'reuso'=>$this->faker->randomElement(['1:2','1:4', '1:6','1:1']),
           'tecnologia'=>$this->faker->randomElement(['radioEnlace','fibra optica']),
           'canon'=>$this->faker->numerify($string="########"),
           'estado'=>$this->faker->randomElement(['activo','inactivo']),
        ];
    }
}
