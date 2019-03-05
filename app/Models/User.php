<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email',
        'password',
        'avatar',
        'address',
        'phone',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_user', 'user_id', 'role_id');
    }

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

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    // public function isSuperAdmin() {
    //     foreach ($this->roles as $role) {
    //         if($role->id == 6) {
    //             return true;
    //         }
    //     return false;
    //     }
        
    // }

    // public function isAdmin() {
    //     foreach ($this->roles as $role) {
    //         if($role->id == 7) {
    //             return true;
    //         }
    //     return false;
    //     }
    // }

}
