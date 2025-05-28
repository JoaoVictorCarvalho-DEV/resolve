<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Solution;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Picture>
 */
class PictureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(2),
            'path' =>$this->faker->url(),
            'description' =>$this->faker->paragraph(),
            'solution_id' => Solution::factory(),
        ];
    }
}
