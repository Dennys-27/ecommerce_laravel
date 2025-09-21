<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 10; $i++) {
            $name = fake()->unique()->company();
            Brand::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => fake()->sentence(),
            ]);
        }
    }
}
