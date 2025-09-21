<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 5; $i++) {
            $name = fake()->unique()->word();

            Category::create([
                'name' => ucfirst($name),
                'slug' => Str::slug($name),
                'description' => fake()->sentence(),
            ]);
        }

    }
}
