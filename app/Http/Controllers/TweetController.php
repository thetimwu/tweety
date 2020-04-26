<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{

    public function store()
    {
        $body = request()->validate([
            'body' => 'required|max:225|min:3'
        ]);

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $body['body']
        ]);

        return redirect('/home');
    }
}
