<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanySupervisor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'company',
        'Student_id',
    ];

    public function Student()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function Meeting()
    {
        return $this->hasMany(Meeting::class, 'id');
    }
}
