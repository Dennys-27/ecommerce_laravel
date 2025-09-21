<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category; // 👈 Importante
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id')->toArray();
        $brands = Brand::pluck('id')->toArray();

        for ($i = 0; $i < 1000; $i++) {
            $name = fake()->unique()->words(10, true);

            Product::create([
                'category_id' => fake()->randomElement($categories),
                'brand_id' => fake()->randomElement($brands),
                'name' => ucfirst($name),
                'slug' => Str::slug($name . '-' . $i),
                'description' => fake()->paragraph(),
                'price' => fake()->randomFloat(2, 5, 500),
                'stock' => fake()->numberBetween(100, 1000),
                'image' => fake()->imageUrl(400, 400, 'technics', true),
                'status' => fake()->randomElement(['active', 'inactive']),
            ]);
        }
    }
}
