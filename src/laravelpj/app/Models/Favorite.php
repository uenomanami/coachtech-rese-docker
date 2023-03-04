<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'user_id',
        'store_id'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Favorite');
    }
}
