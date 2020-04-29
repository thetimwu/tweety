<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
        //option1
        //abort_if($user->isNot(current_user()), 403);

        //option2
        //$this->authorize('edit', $user);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $validatedData = request()->validate([
            'username' => ['required', 'max:255', Rule::unique('users')->ignore($user)],
            'name' => 'required|string|min:3',
            'avatar' => ['file'],
            'email' => ['required', 'string', 'email', Rule::unique('users')->ignore($user)],
            'password' => 'required|min:6|confirmed'
        ]);

        if (request('avatar')) {
            $validatedData['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($validatedData);

        return redirect($user->path());
    }
}
