<?php

namespace App\Models;

use App\Models\company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'User_id',
        'Company_id',
        'rating',
    ];

    public function Company()
    {
        return $this->belongsTo(company::class, 'Company_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
