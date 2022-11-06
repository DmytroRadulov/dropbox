<?php

namespace App\Http\Controllers\Oauth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleController
{
     const GOOGLE_TOKEN_URI = 'https://accounts.google.com/o/oauth2/token';
     const GOOGLE_USER_INFO_URI = 'https://www.googleapis.com/oauth2/v1/userinfo';

    public function __invoke()
    {
        $parameters = [
            'client_id' => config()->get('services.google.client_id'),
            'client_secret' => config()->get('services.google.client_secret'),
            'redirect_uri' => config()->get('services.google.redirect'),
            'grant_type' => 'authorization_code',
            'code' => $_GET['code'],
        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->post( self::GOOGLE_TOKEN_URI, ['form_params' => $parameters]);
        $user = json_decode($response->getBody()->getContents(), true);
        $token = $user['access_token'];
        $response = $client->get(self::GOOGLE_USER_INFO_URI, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ]
        ]);
        $user = json_decode($response->getBody()->getContents(), true);

        if (!$this->createUser($user)) {
            return redirect()->route('auth.login');
        }
        return redirect()->route('admin.panel');

    }

    /**
     * @param array $userInfo
     * @return bool
     */
    protected function createUser(array $userInfo): bool
    {
        if (!isset($userInfo['email'])) {
            return false;
        }
        $user = User::where('email', $userInfo['email'])->first();
        if (empty($user)) {
            $user = User::create([
                'name' => $userInfo['name'],
                'email' => $userInfo['email'],
                'role_name' => 'customer',
                'password' => Hash::make($userInfo['id']),
            ]);
        }
        Auth::login($user);
        return true;
    }
}
