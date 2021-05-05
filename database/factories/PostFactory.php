<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

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
            //use eloquent for this
            'user_id' => User::all()->random()->id
        ];
    }
}
