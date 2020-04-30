<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tweet;
use App\User;

class Like extends Model
{
    protected $guarded = [];

    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
