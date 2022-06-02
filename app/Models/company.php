<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    public function Comment()
    {
        return $this->hasMany(Comment::class, 'Company_id');
    }

    public function Rating()
    {
        return $this->hasMany(Rating::class, 'Company_id');
    }

    public function scopeFilter($query)
    {
        if ($sector = request('sector')) {
            $query->where('sector', $sector);
        }
        // a code for both param such as request('ecoSector','sector')

        if ($search = request('search')) {
            $query->where('name', 'LIKE', "%{$search}%");
        }
        return $query;
    }
}
