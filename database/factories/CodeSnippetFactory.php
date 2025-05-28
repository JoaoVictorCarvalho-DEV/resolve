<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Solution;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CodeSnippet>
 */
class CodeSnippetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'title' => $this->faker->sentence(3),
        'code'=> $this->faker->paragraph(),
        'solution_id' => Solution::factory()
        ];
    }
}
