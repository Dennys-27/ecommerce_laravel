<?php

namespace Database\Seeders;

use App\Models\Wishlist;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('role', 'customer')->get();
        $products = Product::pluck('id')->toArray();

        foreach ($users as $user) {
            $numWishlist = fake()->numberBetween(5, 10); // Cada usuario tendrá entre 5 y 10 productos

            for($i = 0; $i < $numWishlist; $i++) {
                Wishlist::create([
                    'user_id' => $user->id,
                    'product_id' => fake()->randomElement($products),
                ]);
            }
        }
    }
}
