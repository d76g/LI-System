<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Students;


class Supervisor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'staff_id',
        'name',
        'office_phone_number',
        'email',
    ];

    public function Student()
    {
        return $this->hasMany(Students::class, 'id');
    }
}
