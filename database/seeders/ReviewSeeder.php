<?php

namespace Database\Seeders;
use App\Models\Review;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = User::where('role', 'customer')->pluck('id')->toArray();
        $products = Product::all();

        foreach ($products as $product) {
           $numReviews = fake()->numberBetween(10,20);

           for($i = 0; $i < $numReviews; $i++) {
               Review::create([
                   'user_id' => fake()->randomElement($users),
                   'product_id' => $product->id,
                   'rating' => fake()->numberBetween(1, 5),
                   'comment' => fake()->sentence(),
               ]);


            }// Each product will have between 1 to 5 reviews
        }
    }
}
