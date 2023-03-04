<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Closeddate;
use App\Http\Requests\CloseddateRequest;


class StoreDateController extends Controller
{
    public function create(CloseddateRequest $request)
    {
        $store_id = $request->store_id;
        $date = $request->date;

        $param = [
            'store_id' => $store_id,
            'date' => $date,
        ];
        $result = Closeddate::searchDate($store_id, $date);
        if (!$result) {
            Closeddate::create($param);
        }
        return back();
    }

    public function delete(Request $request)
    {
        Closeddate::find($request->closeddate_id)->delete();
        return back();
    }
}
