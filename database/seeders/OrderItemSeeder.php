<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();
        $products = Product::pluck('id')->toArray(); // 👈 aseguramos array

        foreach ($orders as $order) {
            // cada orden tendrá entre 1 y 5 productos
            $numItems = rand(1, 5);
            $total = 0;

            for ($i = 0; $i < $numItems; $i++) {
                $productId = fake()->randomElement($products); // ✅ ahora funciona
                $quantity = rand(1, 3);
                $price = Product::find($productId)->price;

                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $productId,
                    'quantity'   => $quantity,
                    'price'      => $price,
                    'subtotal'   => $price * $quantity,
                ]);

                $total += $price * $quantity;
            }

            // actualizar el total de la orden
            $order->update(['total_price' => $total]);
        }
    }
}
