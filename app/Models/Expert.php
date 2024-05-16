<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $table = 'experts';
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
