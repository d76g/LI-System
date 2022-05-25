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

    public function comment()
    {
        return $this->hasMany(Comment::class, 'id');
    }

    public function scopeFilter($query)
    {
        if ($sector = request('sector')) {
            $query->where('sector', $sector);
        }

        if ($ecoSector = request('ecoSector')) {
            $query->where('eco_sector', $ecoSector);
        }
        // a code for both param such as request('ecoSector','sector')

        if ($search = request('search')) {
            $query->where('name', 'LIKE', "%{$search}%");
        }
        return $query;
    }
}
