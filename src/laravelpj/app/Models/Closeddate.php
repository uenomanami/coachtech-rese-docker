<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Closeddate extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'store_id',
        'date',
    ];

    public static function searchDate($store_id, $date)
    {
        return self::query()->where('store_id', $store_id)->where('date', $date)->exists();
    }
    public static function thisMonth($store_id)
    {
        $from = date('Y-m-01'); // 今月の初日
        $to = date('Y-m-t'); // 今月の末日
        return self::query()
            ->where('store_id', "$store_id")->whereBetween('date', [$from, $to])->orderBy('date', 'asc')->get();;
    }

    public static function nextMonth($store_id)
    {
        $from = date('Y-m-01', strtotime(date('Y-m-01') . '+1 month'));
        $to = date('Y-m-t', strtotime(date('Y-m-t') . '+1 month'));
        return self::query()
            ->where('store_id', "$store_id")->whereBetween('date', [$from, $to])->orderBy('date', 'asc')->get();
    }

    public static function afterNextMonth($store_id)
    {
        $from = date('Y-m-01', strtotime(date('Y-m-01') . '+2 month'));
        $to = date('Y-m-t', strtotime(date('Y-m-t') . '+2 month'));
        return self::query()
            ->where('store_id', "$store_id")->whereBetween('date', [$from,  $to])->orderBy('date', 'asc')->get();
    }
}
