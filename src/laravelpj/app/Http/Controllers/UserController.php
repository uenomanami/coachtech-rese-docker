<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();
        $reserves = Reserve::userReserve($user->id);
        $pastreserves = Reserve::pastReserve($user->id);
        $stores = Auth::user()->favorite_stores()->orderBy('created_at', 'desc')->get();

        $param = [
            'user' => $user,
            'reserves' => $reserves,
            'pastreserves' => $pastreserves,
            'stores' => $stores
        ];
        return view('mypage', $param);
    }
}
