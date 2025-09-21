<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'administrador@example.com',
            'password' => Hash::make('password'),
            'phone' => '1234567890',
            'role' => 'admin',
            'address' => '123 Main St, City, Country',
        ]);

        // Usuarios de prueba
        for ($i = 1; $i <= 40; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'phone' => fake()->phoneNumber(),
                'role' => 'customer', // ojo, aquí tenías 'custommer' (mal escrito)
                'address' => fake()->address(),
            ]);
        }
    }
}
