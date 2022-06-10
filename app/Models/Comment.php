<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'User_id',
        'Company_id',
        'content',
    ];

    public function Company()
    {
        return $this->belongsTo(Company::class, 'Company_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'User_id')->withTrashed();
    }
}
