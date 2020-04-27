<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\User;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        return view('home', ['tweets' => auth()->user()->timeline()]);
    }

    public function store()
    {
        $body = request()->validate([
            'body' => 'required|max:225|min:3'
        ]);

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $body['body']
        ]);

        return redirect('/tweets');
    }
}
