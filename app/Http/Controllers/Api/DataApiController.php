<?php

namespace App\Http\Controllers\Api;

use App\Models\Type;
use App\Models\Plate;
use App\Models\Restaurant;
use App\Models\RestaurantType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataApiController extends Controller
{
    public function index()
    {

        $restaurants = Restaurant::all();

        $res_type = RestaurantType::all();

        $types = Type::all();

        $plates = Plate::all();

        $data = ["restaurants" => $restaurants, "res_type" => $res_type, "types" => $types, "plates" => $plates];

        return response($data);
    }
}