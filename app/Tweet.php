<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use phpDocumentor\Reflection\Types\Boolean;
use App\Traits\Likable;

class Tweet extends Model
{
    use Likable;

    protected $fillable = ['user_id', 'body'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
