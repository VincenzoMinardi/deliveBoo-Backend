<?php

namespace App\Http\Controllers\Api\Orders;

use App\Models\Order;
use App\Models\Plate;
use App\Models\OrderPlate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email'],
            'address' => ['required', 'string', 'max:50'],
            'pc' => ['required', 'max:5'],
            'phone' => ['required', 'string', 'max:10'],
            'date' => ['required', 'date'],
            'card_number' => ['required', 'min:16', 'max:16'],
            'cvv' => ['required', 'min:3', 'max:3'],
            'card_name' => ['required', 'string', 'max:255'],
            'plates' => ['required', 'min:1']
        ]);

        // $res_id = $request->plate[0]->res_id;
        // $priceAll = null;

        // $plates = Plate::where('restaurant_id', $res_id)->select("price");

        // foreach ($request->plates as $key => $piattoClient) {
        //     foreach ($plates as $key => $plate) {
        //         if ($piattoClient->id == $plate->id) {
        //             $priceAll += ($piattoClient->quantit * $plate->price);
        //         }
        //     }
        // }


        // $newOrder = Order::create([
            
        //         "restaurant_id" => $data['res_id'],
        //         "name" => $data['name'],
        //         "lastname" => $data['lastname'],
        //         "pc" => $data['pc'],
        //         "address" => $data['address'],
        //         "phone" => strval($data['phone']),
        //         "date" => $data['date'],
        //         "status" => 1,
        //         "price" => $data['price'],
            
        //     ]);
            
        $data = $request->all();

        $newOrder = new Order();

        $newOrder->restaurant_id = $data['res_id'];
        $newOrder->name = $data['name'];
        $newOrder->lastname = $data['lastname'];
        $newOrder->pc = $data['pc'];
        $newOrder->address = $data['address'];
        $newOrder->phone = strval($data['phone']);
        $newOrder->date = $data['date'];
        $newOrder->status = 1;
        $newOrder->price = $data['price'];
        $newOrder->save();

        // $newOrder->plates()->sync()

        // foreach ($data['plates'] as $key => $value) {
        //     $newBridge = new OrderPlate();

        //     $newBridge->orders_id = $newOrder['id'];
        //     $newBridge->plates_id = $value['id'];
        //     $newBridge->amount = $value['quantit'];
        //     $newBridge->save();
        // };

        // $newOrder->plates()->sync($data['plates']['id'], $data['plates']['quantit']);
        $idArr = [];
        $quantit = [];
        foreach ($data['plates'] as $key => $value) {
            array_push($idArr, $value['id']);
            array_push($quantit, $value['quantit']);
        }
        
        $newOrder->plates()->sync($idArr, $quantit);

        // return response($request->plates);
        return response($quantit);
        // return response(DB::table('plates')->where('restaurant_id', "=", $res_id)->get());
    }
}
