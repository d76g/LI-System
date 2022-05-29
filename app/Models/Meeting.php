<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'time',
        'type',
        'link',
        'CompanySupervisor_id',
        'Supervisor_id',
        'Student_id',
    ];

    public function Supervisor()
    {
        return $this->belongsTo(User::class, 'Supervisor_id');
    }

    public function Student()
    {
        return $this->belongsTo(User::class, 'Student_id');
    }

    public function CompanySupervisor()
    {
        return $this->belongsTo(CompanySupervisor::class, 'CompanySupervisor_id');
    }
}
