<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::where('status', 'paid')->get();

        foreach ($orders as $order) {
            Payment::create([
                'order_id' => $order->id,
                'payment_method' => fake()->randomElement(['paypal', 'bank_transfer']),
                'amount' => $order->total_price,
                'transaction_id' => fake()->uuid(),
                'transaction_json' => json_encode([
                    'status' => 'success',
                    'transaction_id' => fake()->uuid(),
                ]),
                'status' => 'completed',
            ]);
        }
    }
}
