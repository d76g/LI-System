<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'eco_sector',
        'sector',
        'email',
        'phone_number',
        'image_path',
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class, 'id');
    }
}
