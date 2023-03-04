<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'name',
        'category_id',
        'area_id',
        'description',
        'image_url',
        'user_id'
    ];

    public function getArea()
    {
        return '#' . optional($this->area)->name;
    }

    public function getCategory()
    {
        return '#' . optional($this->category)->name;
    }

    public function Area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function Category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function reserves()
    {
        return $this->hasMany('App\Models\Reserve');
    }

    public function is_reserve($store_id, $user_id)
    {
        return $this->reserves()->where('store_id', $store_id)->where('user_id', $user_id)->where('start_at', '<', date(now()))->exists();
    }

    public static function doSearch($area, $category, $content)
    {
        $query = self::query();
        if (!empty($area)) {
            $query->where('area_id', "$area");
        }
        if (!empty($category)) {
            $query->where('category_id', "$category");
        }
        if (!empty($content)) {
            $query->where('name', 'like', "%{$content}%");
        }

        $results = $query->get();
        return $results;
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function is_comments($store_id)
    {
        return $this->comments()->where('store_id', $store_id)->exists();
    }

    public function is_userComment($store_id, $user_id)
    {
        return $this->comments()->where('store_id', $store_id)->where('user_id', $user_id)->exists();
    }

    public static function searchStore($user_id)
    {
        $query = self::query();
        $query->where('user_id', "$user_id");
        $results = $query->first();
        return $results;
    }
}
