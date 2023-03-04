<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
    public function create(Request $request)
    {
        $user = Auth::user();
        $store_id = $request->store_id;

        if (!$user->is_favorite($store_id)) {
            $favorite = [
                'store_id' => $store_id,
                'user_id' => Auth::id(),
            ];
            Favorite::create($favorite);
        }

        return back();
    }

    public function delete(Request $request)
    {
        $user = Auth::user();
        $store_id = $request->store_id;

        if ($user->is_favorite($store_id)) {
            $query = Favorite::query();
            $query->where('store_id', "$store_id")
                ->where('user_id', $user->id)->delete();
        }

        return back();
    }
}
