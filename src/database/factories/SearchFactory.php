<?php

namespace Database\Factories;

use App\Models\Search;
use Illuminate\Database\Eloquent\Factories\Factory;

class SearchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'fullname' => $this->faker->name,
            'gender' => $this->faker->randomElement(['1', '2']),
            'email' => $this->faker->safeEmail,
            'option' =>$this->faker->text(120)
        ];
    }
        
}
