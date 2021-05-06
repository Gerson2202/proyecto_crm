<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'asunto'=>$this->faker->text($maxNbChars=15),
            // 'mensaje'=>$this->faker->text($maxNbChars=100),
            'user_id'=>$this->faker->randomElement(['3','2']),
            'level_id'=>$this->faker->randomElement(['1','2']),
            'cliente_id'=>$this->faker->randomElement(['1','2','3','4','5','6']),
            // 'support_id'=>$this->faker->randomElement(['3','2']),
            'tipologia_id'=>$this->faker->randomElement(['3','2','1']),
            'peticion_id'=>$this->faker->randomElement(['3','2','1']),
            'medio_id'=>$this->faker->randomElement(['3','2','1']),
        ];
    }
}
