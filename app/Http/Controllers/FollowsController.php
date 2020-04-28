<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function toggle(User $user)
    {
        auth()->user()->toggleFollow($user);

        return back();
    }
}
