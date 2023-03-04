<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;


class AdministorController extends Controller
{
    public function index()
    {
        return view('administor');
    }

    public function create(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'permission_id' => '2',
        ]);

        event(new Registered($user));

        return redirect("/administor");
    }
}
