<?php

namespace App\Http\Controllers\Api;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeApiController extends Controller
{
    public function index()
    {
        $types = Type::all();

        return response()->json($types);
    }
}
