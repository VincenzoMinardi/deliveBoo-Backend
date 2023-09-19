<?php

namespace App\Http\Controllers\Auth;

use App\Models\Type;
use App\Models\User;
use Illuminate\View\View;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\TypeController;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $types = Type::all();
        return view('auth.register')->with('types', $types);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'rest_name' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:50'],
            'vat' => ['required', 'string', 'max:11', 'min:11', 'unique:' . Restaurant::class],
            'img' => ['nullable', 'image', 'max:150'],
            'types' => ['min:1']
        ]);

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $image = Storage::put('uploads', $data['img']);


        $restaurant = Restaurant::create([
            'rest_name' => $request->rest_name,
            'address'   => $request->address,
            'vat'       => $request->vat,
            'img'       => $image,
            'user_id'    => $user->id,
        ]);

        $restaurant->types()->sync($request["types"]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
