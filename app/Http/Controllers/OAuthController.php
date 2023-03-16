<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Log;


class OAuthController extends Controller
{
    public function login(Request $request)
    {
        $value = $request->session()->get('authenticatedUser');       
        if ($value != null)
        {
            return redirect('/dashboard')->with('alreadyLoggedIn', 'Hey, you\'re already logged in.');
        } 
        return view('login');
    }
    public function redirectToGoogle(Request $request)
    {
        return Socialite::driver('google')->stateless()->with(["prompt" => "select_account"])->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try{
            $userInfo = Socialite::driver('google')->stateless()->user();

            $user = [
                'name' => $userInfo->getName(),
                'email' => $userInfo->getEmail(),
                'avatar' => $userInfo->getAvatar(),
            ];      
            $request->session()->put('authenticatedUser', $user);
            return redirect('/dashboard');

        } catch (\Exception $e) {
            // Handle the exception here
            Log::error('Exception occurred: ' . $e->getMessage());
            return redirect('/')->withErrors(['error' => 'An error occurred. Please try again later.']);
        }        
    }

    public function logout(Request $request)
    {
        $request->session()->put('authenticatedUser', null);
        return view('login');
    }
}
