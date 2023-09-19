<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (config('restaurants') as $restaurant) {
            //creare riga nel DB
            $restaurants = Restaurant::create([

                "user_id"   => $restaurant['user_id'],
                "rest_name" => $restaurant['rest_name'],
                "address"   => $restaurant['address'],
                "vat"       => $restaurant['vat'],
                "img"       => $restaurant['img'],


            ]);

            $restaurants->types()->sync($restaurant['types']);
        }
    }
}
