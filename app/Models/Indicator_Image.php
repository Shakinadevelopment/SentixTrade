<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator_Image extends Model
{
    use HasFactory;

    protected $table = 'indicator_images';
   
    protected $fillable = ['images_name', 'images_path'];

    public function indicator()
    {
        return $this->belongsTo(Indicator::class);
    }
}
