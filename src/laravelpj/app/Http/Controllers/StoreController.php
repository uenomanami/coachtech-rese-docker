<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Area;
use App\Models\Category;
use App\Models\Store;
use App\Models\Reserve;
use App\Models\Comment;
use App\Models\Closeddate;

class StoreController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $area = Area::all();
        $category = Category::all();
        $stores = Store::all();
        $param = [
            'user' => $user,
            'areas' => $area,
            'categories' => $category,
            'stores' => $stores
        ];
        return view('index', $param);
    }

    public function detail(Request $request)
    {
        $user_id = Auth::id();
        $store_id = $request->store_id;
        $store = Store::find($request->store_id);
        $reserve = Reserve::searchReserve($user_id, $store_id);
        $comment = Comment::searchComment($store_id);

        $closeddates = Closeddate::thisMonth($store_id);
        $closeddates_lastmonth = Closeddate::nextMonth($store_id);
        $closeddates_monthafternext = Closeddate::afterNextMonth($store_id);

        $param = [
            'user_id' => $user_id,
            'store' => $store,
            'reserves' => $reserve,
            'comments' => $comment,
            'closeddates' => $closeddates,
            'closeddates_lastmonth' => $closeddates_lastmonth,
            'closeddates_monthafternext' => $closeddates_monthafternext,
        ];
        return view('detail', $param);
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $input_area = $request->area;
        $input_category = $request->category;
        $input_content = $request->store_name;
        $stores = Store::doSearch($input_area, $input_category, $input_content);

        $area = Area::all();
        $category = Category::all();

        $param = [
            'user' => $user,
            'areas' => $area,
            'categories' => $category,
            'stores' => $stores,
            'input_area' => $input_area,
            'input_category' => $input_category,
            'input_content' => $input_content,
        ];
        return view('index', $param);
    }
}
