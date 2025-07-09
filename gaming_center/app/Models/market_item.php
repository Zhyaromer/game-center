<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class market_item extends Model
{
    /** @use HasFactory<\Database\Factories\MarketItemFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
    ];

    protected $primaryKey = 'market_item_id';

    protected $appends = [
        'image_url',
    ];

    protected $hidden = [
        'image',
    ];

    public function getImageUrlAttribute()
    {
        return env('APP_URL') .'/food-imgs/' . $this->image;
    }
}
