<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Solution>
 */
class SolutionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph(),
            'code_snippet' => $this->faker->randomElement([
                'echo "Hello World!";',
                'console.log("Hello World");',
                'print("Hello World")'
            ]),
            'user_id' => User::factory(), // cria um user automaticamente se não for passado
        ];
    }
}
