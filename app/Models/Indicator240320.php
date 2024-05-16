<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    protected $table = 'indicators';
    protected $fillable = [
        'sku',
        'name',
        'quantity',
        'price',
        'brand',
        'manufacture',
        'photo',
        'link',
        'description',
        'related',
    ];
}
