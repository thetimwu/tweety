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

        return Tweet::whereIn('user_id', $ids)->latest()->get();
    }

    public function getAvatorAttribute()
    {
        return "https://i.pravatar.cc/200?u=" . $this->email;
    }

    public function path($append = '')
    {
        $route = route('profile', $this->name);
        return $append ? "{$route}/{$append}" : $route;
    }


    // for laravel 6 or below
    // public function getRouteKeyName()
    // {
    //     return 'name';
    // }
}
