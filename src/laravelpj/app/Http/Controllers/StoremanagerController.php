<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\Reserve;
use App\Models\Area;
use App\Models\Category;
use App\Http\Requests\StoreinfoRequest;
use App\Http\Requests\StoreEditRequest;
use App\Models\Closeddate;

class StoremanagerController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $store = Store::searchStore($user->id);
        if (!empty($store)) {
            $reserves = Reserve::storeReserve($store->id);
            $param = [
                'store' => $store,
                'reserves' => $reserves,
            ];
        } else {
            $areas = Area::all();
            $categories = Category::all();

            $param = [
                'store' => $store,
                'areas' => $areas,
                'categories' => $categories
            ];
        }
        return view('storemanager', $param);
    }

    public function create(StoreinfoRequest $request)
    {
        $user_id = Auth::id();
        $file_name = $request->file('image_url')->getClientOriginalName();
        $request->file('image_url')->storeAs('public', $file_name);

        $store = [
            'name' => $request->name,
            'area_id' => $request->area,
            'category_id' => $request->category,
            'description' => $request->description,
            'image_url' => 'storage/' . $file_name,
            'user_id' => $user_id
        ];
        Store::create($store);
        return redirect('storemanager');
    }

    public function reserve(Request $request)
    {
        $reserve = Reserve::find($request->reserve_id);

        $param = [
            'reserve' => $reserve,
        ];
        return view('storereserve', $param);
    }

    public function edit(Request $request)
    {
        $store = Store::find($request->store_id);
        $areas = Area::all();
        $categories = Category::all();

        $closeddates = Closeddate::thisMonth($request->store_id);
        $closeddates_lastmonth = Closeddate::nextMonth($request->store_id);
        $closeddates_monthafternext = Closeddate::afterNextMonth($request->store_id);

        $param = [
            'store' => $store,
            'areas' => $areas,
            'categories' => $categories,
            'closeddates' => $closeddates,
            'closeddates_lastmonth' => $closeddates_lastmonth,
            'closeddates_monthafternext' => $closeddates_monthafternext
        ];
        return view('storeinfo', $param);
    }

    public function update(StoreEditRequest $request)
    {
        unset($request->_token);
        if (!empty($request->file('image_url'))) {
            $file_name = $request->file('image_url')->getClientOriginalName();
            $request->file('image_url')->storeAs('public', $file_name);

            $store = [
                'area_id' => $request->area,
                'category_id' => $request->category,
                'description' => $request->description,
                'image_url' => 'storage/' . $file_name,
            ];
        } else {
            $store = [
                'area_id' => $request->area,
                'category_id' => $request->category,
                'description' => $request->description,
            ];
        }
        Store::find($request->store_id)->update($store);
        return redirect('storemanager');
    }
}
