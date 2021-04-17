<?php

namespace Database\Factories;

use App\Models\todo;
use Illuminate\Database\Eloquent\Factories\Factory;

class todoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = todo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //filler
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->sentence(4),
            'state' => 0,
        ];
    }
}
