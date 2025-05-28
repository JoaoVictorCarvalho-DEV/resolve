<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Tag;
use App\Models\Video;
use App\Models\CodeSnippet;
use App\Models\Picture;

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
            'user_id' => User::factory(), // cria um user automaticamente se não for passado
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (\App\Models\Solution $solution) {
            // Cria de 1 a 3 tags e associa
            $tags = Tag::factory()->count(rand(1, 3))->create();

            Video::factory()->count(rand(0, 4))->create([
                'solution_id' => $solution->id
            ]);

            Picture::factory()->count(rand(0,4))->create([
                'solution_id' =>$solution->id
            ]);

            CodeSnippet::factory()->count(rand(0, 3))->create([
                'solution_id' => $solution->id
            ]);

            $solution->tags()->attach($tags->pluck('id'));


        });
    }
}
