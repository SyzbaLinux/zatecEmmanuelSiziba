<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleController extends Controller
{
    public  function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function  handleGoogleCallback()
    {

        try {

            $user = Socialite::driver('google')->user();

            //Check if the user exists in the database
            $finduser = User::where('google_id', $user->id)->first();


            if($finduser){ // If user is found create seesion for the user

                Auth::login($finduser);
                return redirect()->intended('dashboard');

            }else{

                //register a new user if user is not found
                $newUser = User::create([
                    'name'      => $user->name,
                    'email'     => $user->email,
                    'google_id' => $user->id,
                    'password'  => Hash::make($user->id), //create a password using the google id
                ]);

                //Login the newly created user
                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }

            } catch (Exception $e) {

                dd($e->getMessage());
        }


    }
}
