<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['rawImage'];

    protected static function booted()
    {
        static::deleted(function ($product) {
            if ($product->image != null)
                Storage::disk('public')->delete('products/' . $product->rawImage);
        });
    }

    public function getImageAttribute()
    {
        return  'https://admin-duniabelanja.krobot.my.id/storage/products/' . $this->attributes['image'];
    }

    public function getRawImageAttribute()
    {
        return $this->attributes['image'];
    }
}
