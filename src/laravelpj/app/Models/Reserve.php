<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'user_id',
        'store_id',
        'num_of_people',
        'start_at',
        'course_amount',
    ];

    public function getStorename()
    {
        return optional($this->store)->name;
    }

    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    public static function searchReserve($user_id, $store_id)
    {
        $query = self::query();
        $query->where('user_id', "$user_id")->where('store_id', "$store_id")->where('start_at', '>=', date(now()))->orderBy('start_at', 'asc');

        $results = $query->get();
        return $results;
    }

    public static function userReserve($user_id)
    {
        $query = self::query();
        $query->where('user_id', "$user_id")->where('start_at', '>=', date(now()))->orderBy('start_at', 'asc');

        $results = $query->get();
        return $results;
    }

    public static function pastReserve($user_id)
    {
        $query = self::query();
        $query->where('user_id', "$user_id")->where('start_at', '<', date(now()))->orderBy('start_at', 'desc');

        $results = $query->get();
        return $results;
    }

    public static function storeReserve($store_id)
    {
        $query = self::query();
        $query->where('store_id', "$store_id")->orderBy('start_at', 'asc');

        $results = $query->get();
        return $results;
    }
    public function getUsername()
    {
        return optional($this->user)->name;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
