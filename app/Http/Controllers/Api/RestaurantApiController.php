<?php

namespace App\Http\Controllers\Api;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantApiController extends Controller
{
    public function index(Request $request)
    {
        $searchType = $request->query('type', '');

        $restaurants = Restaurant::join('restaurant_type', 'restaurants.id', '=', 'restaurant_type.restaurant_id')
                                ->join('types', 'restaurant_type.type_id', '=', 'types.id')
                                ->where('types.id', $searchType)
                                ->select('restaurants.*')
                                ->get();
        
        return response()->json($restaurants);
    }
}