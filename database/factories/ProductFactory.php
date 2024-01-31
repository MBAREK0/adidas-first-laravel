<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description'=>fake(20)->text(),
            'price'=>'220',
            'image'=>'nhbvgvsx.png',
            'tags'=>(string) fake()->name(),
            'cat_id'=> '1'
        ];
    }
}
