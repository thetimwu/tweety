<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Tweet;
use App\Traits\Followable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'avatar'
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
    ];

    public function tweets()
    {
        return $this->hasMany('App\Tweet')->latest();
    }

    public function timeline()
    {
        // $ids = $this->follows->pluck('id');
        // another way to do it, better option
        $ids = $this->follows()->pluck('users.id');
        $ids->push($this->id);

        return Tweet::whereIn('user_id', $ids)->withLikes()->latest()->paginate(50);
    }

    public function getAvatarAttribute($value)
    {
        return asset(($value ? 'storage/' . $value : '/images/default-avatar.jpeg'));
    }

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = bcrypt($value);
    }

    public function path($append = '')
    {
        $route = route('profile', $this->username);
        return $append ? "{$route}/{$append}" : $route;
    }


    // for laravel 6 or below
    // public function getRouteKeyName()
    // {
    //     return 'name';
    // }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
