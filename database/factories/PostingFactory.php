<?php

namespace Database\Factories;

use App\Models\Posting;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Posting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description'=> $this->faker->realText($this->faker->numberBetween(10,20)),
            'price' => $this->faker->randomFloat(10, 20, 30),
            'contact' => $this->faker->unique()->safeEmail,
        ];
    }
}
