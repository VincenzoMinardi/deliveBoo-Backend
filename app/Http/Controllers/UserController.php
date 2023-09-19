<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Recupera l'utente autenticato

        return view('dashboard', ['user' => $user]);
    }

    public function restaurant()
    {
        User::find(1);
    }
}
