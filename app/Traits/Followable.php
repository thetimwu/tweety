<?php

namespace App\Traits;

use App\User;

trait Followable
{
    public function follows()
    {
        return $this->belongsToMany(User::class, 'user_follower', 'user_id', 'follower_id')->withTimestamps();
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function isFollowing(User $user)
    {
        // not efficient for larg number of followers
        // return $this->follows->contain($user);
        // better solution
        return $this->follows()->where('follower_id', $user->id)->exists();
    }

    public function toggleFollow(User $user)
    {
        // if ($this->isFollowing($user)) {
        //     return $this->unfollow($user);
        // }

        // return $this->follow($user);

        return $this->follows()->toggle($user);
    }
}
