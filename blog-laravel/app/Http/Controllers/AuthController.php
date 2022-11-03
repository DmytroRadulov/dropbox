<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    public function login()
    {
        $parameters = [
            'redirect_uri' => getenv('GOOGLE_REDIRECT_URI'),
            'response_type' => 'code',
            'client_id' => getenv('GOOGLE_CLIENT_ID'),
            'scope' => implode(' ', GOOGLE_SCOPES),
        ];
        $uri = GOOGLE_AUTH_URI . '?' . http_build_query($parameters);
        return view("auth/form", compact('uri'));
    }

    public function handleLogin(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6']
        ]);

        if (Auth::attempt($data)) {
            $user = Auth::user();
            if (Hash::needsRehash($user->password)) {
                $user->password = Hash::make($data['password']);
                $user->save();
            }
            return redirect()->route('admin.panel');
        }
        return back()->withErrors([
            'email' => 'Errors'
        ]);

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('main');

    }
}
