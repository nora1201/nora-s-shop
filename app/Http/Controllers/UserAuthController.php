<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class UserAuthController extends Controller
{
    //
    function facebookSignIn()
    {
        $redirect_url = env('FB_REDIRECT');
        return Socialite::driver('facebook')
            ->scopes(['user_friends'])
            ->redirect();
    }

    function facebookSignInCallbackProcess()
    {
        if (request()->error == 'access_denied') {
//            throw new Exception('授權失敗，存取錯誤');
            abort(404,"Facebook Authenticate Failed");
        }

        $redirect_url = env('FB_REDIRECT');
        $FacebookUser = Socialite::driver('facebook')
            ->fields(['name', 'email', 'gender',
                'verified', 'link', 'first_name', 'last_name', 'locale'])
            ->redirectUrl($redirect_url)->user();
        $facebook_email = $FacebookUser->email;
        if (is_null($facebook_email)) {
            abort(404,"Facebook Authenticate Failed");
        } else {
            $facebook_id = $FacebookUser->id;
            $facebook_name = $FacebookUser->name;
            return redirect('/home');
        }
    }
}
