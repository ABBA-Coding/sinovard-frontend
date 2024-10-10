<?php

namespace App;

use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMIN = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'login', 'email', 'email_verified_at', 'password', 'phone', 'phone_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    public function role(): HasOne
    {
        return $this->hasOne(Role::class);
    }

    public function verified()
    {
        return (!empty($this->email_verified_at) || !empty($this->phone_verified_at));
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone']  = preg_replace('/\D+/', null, $value);
    }

    public static function getAuthRole()
    {
        return \Illuminate\Support\Facades\Auth::user()->role->role;
    }
}
