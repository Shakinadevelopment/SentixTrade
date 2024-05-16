<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Indicator extends Model
{
    protected $table = 'indicators';
   
    protected $fillable = [
        'title',
        'slug',
        'link',
        'price',
        'brand',
        'manufacture',
        'image_path',
        'description',
        'related',
    ];

    // public function images()
    // {
    //     return $this->hasMany(Indicator_Image::class);
    // }


    public function relatedItems()
    {
        // Assuming the foreign key is 'related_item_id' in the same table
        return $this->hasMany(Indicator::class, 'related');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($indicator) {
            $indicator->slug = Str::slug($indicator->title);
        });

        static::updating(function ($indicator) {
            $indicator->slug = Str::slug($indicator->title);
        });
    }
    
}
