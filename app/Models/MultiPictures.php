<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiPictures extends Model
{
    use HasFactory;
    protected $fillable = [

        'images_path',
    ];
}
