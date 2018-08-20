<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class UserAuthController extends Controller
{
    //
    function facebookSignIn(){

    }
    function facebookSignInCallbackProcess(){
        $redirect_url= env('FB_REDIRECT');
        return Socialite::driver('facebook')
            ->scopes(['user_friend'])
            ->redirectUrl($redirect_url)
            ->redirect();
    }
}
