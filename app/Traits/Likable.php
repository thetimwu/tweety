<?php

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
        return (bool) $this->likes->where('user_id', $user->id)->where('liked', true)->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $this->likes->where('user_id', $user->id)->where('liked', false)->count();
    }
}
