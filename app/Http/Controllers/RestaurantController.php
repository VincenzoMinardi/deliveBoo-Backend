<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;
use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function processUserRestaurants()
    {
        $user = User::find(1);

        $restaurantsData[] = [];

        foreach ($user->restaurants as $restaurant) {
            $restaurantsData[] = [
                'name'    => $restaurant->rest_name,
                'user_id' => $restaurant->user_id,
                'address' => $restaurant->address,
                'vat'     => $restaurant->vat,
                'img'     => $restaurant->img,
            ];
        }

        return view('user.restaurants', ['restaurantsData' => $restaurantsData]);
    }

    public function index()
    {
        $users = User::all();
        $plates = Plate::with('restaurant')->where('restaurant_id', Auth::id())->get();
        $types = DB::table('restaurants')->join('restaurant_type', 'restaurants.id', '=', 'restaurant_type.restaurant_id')
            ->join('types', 'restaurant_type.type_id', '=', 'types.id')
            ->where('restaurants.id', Auth::id())
            ->select('types.name')
            ->get();
        $restaurants = Restaurant::with('user')->where('user_id', Auth::id())->get();

        return view('dashboard', compact('restaurants', 'plates', 'types'));
    }

    public function create()
    {
        return view('plates.create');
    }

    public function store(Request $request) {
        $data = $request->all();
        $img_path = Storage::disk('public')->put('uploads', $data['img']);
    }

    public function show(Restaurant $restaurant)
    {
        //
    }

    public function edit(Restaurant $restaurant)
    {
        //
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
