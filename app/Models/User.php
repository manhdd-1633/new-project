<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatarUserAttribute()
    {
        if ($this->avatar) {
            return config('site.user.display-image') . $this->avatar;
        }
        return config('site.avatar-default');
    }

    public static function scopeGetUsers($query)
    {
        return $query->orderBy('id', 'DESC');
    }
}
