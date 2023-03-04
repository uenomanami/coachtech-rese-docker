<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'user_id',
        'store_id',
        'star',
        'comment'
    ];

    public function getUsername() //修正
    {
        return optional($this->user)->name;
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    public static function searchComment($store_id)
    {
        $query = self::query();
        $query->where('store_id', "$store_id");
        $results = $query->get();
        return $results;
    }
}
