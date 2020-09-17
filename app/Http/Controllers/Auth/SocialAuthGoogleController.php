<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\User;
use Socialite;
use Auth; 
use Exception;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class SocialAuthGoogleController extends Controller
{

    public function redirect(){

        return Socialite::driver('google')->redirect();

    }

    public function handleCallback(){


        try{

            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id' , $user->id)->first();

            if($finduser){

                Auth::login($finduser);


                return redirect('/');

            }else{

                $newUser = User::create([

                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,

                ]);

                Auth::login($newUser);


                return redirect('/');


            }


        } catch (Exception $e){

            dd($e->getMessage());

        }



    }


}
