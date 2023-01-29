<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class Authentication_Controller extends Controller
{
    //
    public function loginValidate(Request $request)
    {
        $validate_confirm =  $request->validate
        ([
            'user_email'=> 'required',
            'password'=>'required',
        ]);

        $credentials =
        [
            'user_email'=>$request->user_email,
            'password'=>$request->password,
        ];


        if(Auth::attempt(($credentials), true))
        {
            if($request->remember_me == 'on')
            {

                Cookie::queue('user_email', $request->user_email, 120);
                // dd(Cookie::get('user_email'));

            }
            return redirect('/home');
        }

        $error_message = 'Email or password inputted not valid!';
        return redirect()->back()->withErrors($error_message)->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/home');
    }

    public function registerValidate(Request $request)
    {
        $validate_confirm = $request->validate
        ([
            'user_name'=>'required|min:5',
            'user_email'=>['required', 'unique:users,user_email'],
            'password'=>'required|min:5, alpha_num|confirmed',
            'user_gender'=>'required',
            'user_DOB'=>'required|before:today,after:1990-01-01',
            'user_country'=>'required',
        ]);

        $user_name = $request->user_name;
        $user_email = $request->user_email;
        $password = Hash::make($request->password);
        $user_gender = $request->user_gender;
        $user_DOB = $request->user_DOB;
        $user_country = $request->user_country;

        User::insert
        ([
            'user_name'=>$user_name,
            'user_email'=>$user_email,
            'password'=>$password,
            'user_gender'=>$user_gender,
            'user_DOB'=>$user_DOB,
            'user_country'=>$user_country,
        ]);

        $credentials =
        [
            'user_email'=>$user_email,
            'password'=>$request->password,
        ];

        Auth::attempt(($credentials), true);

        Cart::insert([
            'user_id'=>Auth::id(),
        ]);

        Auth::logout();

        return redirect()->back()->with('registerSuccessfully', 'Successfully registered your account.');


    }
}
