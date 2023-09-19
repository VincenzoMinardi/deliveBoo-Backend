<?php

namespace App\Http\Controllers\Api;

use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{
    public function index()
    {

        $restaurants = Restaurant::all();

        $plates = Plate::all();

        $results = ["restaurants" => $restaurants, "plates" => $plates];

        return response($results);
    }

    public function show(Request $request, Restaurant $restaurant)
    { 
        // $restaurantshow = DB::table('restaurants')
        //     ->join ('plates', 'restaurants.id', '=', 'restaurant_id')
        //     ->select('restaurants.id', 'restaurants.rest_name','restaurants.img', 'plates.restaurant_id', 'plates.name', 'plates.ingredients', 'plates.price')
        //     ->get();

        // $restaurantId = $restaurant->id;
        
        $restaurantshow = DB::table('restaurants')
            ->join('plates', 'restaurants.id', '=', 'plates.restaurant_id')
            ->select('restaurants.id', 'restaurants.rest_name','restaurants.address', 'restaurants.img', 'plates.*')
            ->where('restaurants.id', '=', $restaurant->id)
            ->get();

        return response()->json($restaurantshow);
    }
}










/*
$restaurants = Restaurant::select('restaurants')->join('plates')->get();

$restaurants = DB::table('plates')
            ->select('restaurant_id','name', 'price', 'ingredients')
            ->join ('restaurants')
            ->where ('restaurants.id', '=', 'restaurant_id')
            'restaurants.img', 'restaurants.rest_name', 'restaurants.address'
            , 'plates.name', 'plates.ingredients', 'plates.price'
            ->get();
*/

            
