<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    const GOOGLE_SCOPES = [
        'https://www.googleapis.com/auth/userinfo.email',
        'https://www.googleapis.com/auth/userinfo.profile'
    ];
    const GOOGLE_AUTH_URI = 'https://accounts.google.com/o/oauth2/auth';

    public function login()
    {
        $parameters = [
            'redirect_uri' => config()->get('services.google.redirect'),
            'response_type' => 'code',
            'client_id' => config()->get('services.google.client_id'),
            'scope' => implode(' ', self::GOOGLE_SCOPES),
        ];
        $uri = self::GOOGLE_AUTH_URI . '?' . http_build_query($parameters);
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
