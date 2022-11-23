<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition()
    {
        $name = fake()->unique()->userName();
        return [
            'name' => $name,
            'image' => $name . '.png',
            'price' => rand(1, 999) / 10.0,
            'category_id' => Category::all()->random()->id,
        ];
    }
}
