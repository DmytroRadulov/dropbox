<?php

namespace App\Http\Controllers\Oauth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class GoogleController
{
    public function __invoke()
    {
        $parameters = [
            'client_id' => GOOGLE_CLIENT_ID,
            'client_secret' => GOOGLE_CLIENT_SECRET,
            'redirect_uri' => GOOGLE_REDIRECT_URI,
            'grant_type' => 'authorization_code',
            'code' => $_GET['code'],
        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->post(GOOGLE_TOKEN_URI, ['form_params' => $parameters]);
        $user = json_decode($response->getBody()->getContents(), true);
        $token = $user['access_token'];
        $response = $client->get(GOOGLE_USER_INFO_URI, [
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
