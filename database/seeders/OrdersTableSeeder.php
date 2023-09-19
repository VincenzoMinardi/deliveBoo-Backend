<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('orders') as $order) {

            $order = Order::create([

                "name"              => $order['name'],
                "lastname"           => $order['lastname'],
                "pc"                => $order['pc'],
                "address"           => $order['address'],
                "phone"             => $order['phone'],
                "date"              => $order['date'],
                "status"            => $order['status'],
                "price"             => $order['price'],


            ]);
        }
    }
}
