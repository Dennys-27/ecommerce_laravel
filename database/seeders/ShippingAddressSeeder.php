<?php

namespace Database\Seeders;
use App\Models\ShippingAddress;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = User::all();

        foreach ($users as $user) {
            $numAddresses = fake()->numberBetween(1,3); // Each user can have 1 to 3 addresses

            for ($i = 0; $i < $numAddresses; $i++) {
                ShippingAddress::create([
                    'user_id' => $user->id,
                    'address' => fake()->streetAddress(),

                    'city' => fake()->city(),
                    'state' => fake()->state(),
                    'zip_code' => fake()->postcode(),
                    'country' => fake()->country(),

                ]);
            }
        }
    }
}
