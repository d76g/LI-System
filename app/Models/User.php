<?php

namespace App\Models;

use Role;
use App\Models\CompanySupervisor;
use App\Models\Role as ModelsRole;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function Role()
    {
        return $this->belongsTo(ModelsRole::class);
    }

    public function Comment()
    {
        return $this->hasOne(Comment::class, 'User_id');
    }

    public function Rating()
    {
        return $this->hasOne(Rating::class, 'User_id');
    }

    public function CompanySupervisor()
    {
        return $this->hasOne(CompanySupervisor::class, 'Student_id');
    }

    public function Student()
    {
        return $this->hasMany(Students::class, 'id');
    }

    public function Meeting()
    {
        return $this->hasMany(Meeting::class, 'id');
    }

    public function scopeFilter($query)
    {
        if ($role = request('role')) {
            $query->where('role_id', $role);
        }
        // a code for both param such as request('ecoSector','sector')

        if ($search = request('search')) {
            $query->where('name', 'LIKE', "%{$search}%");
        }
        return $query;
    }
}
