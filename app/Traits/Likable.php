<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\User;

trait Likable
{
    //could set a polymorph for tweet, user or blog post
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()
        ], ['liked' => $liked]);
    }

    public function dislike($user = null)
    {
        $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        return (bool) $this->likes()->where('user_id', $user->id)->where('liked', true)->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $this->likes()->where('user_id', $user->id)->where('liked', false)->count();
    }

    public function scopeWithLikes(Builder $query)
    {
        return $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'id'
        );
    }
}
