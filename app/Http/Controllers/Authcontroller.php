<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Table_login;
use Illuminate\Support\Facades\Hash; // ✅ CORRECT
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;




class Authcontroller extends Controller
{

    function user_login(){
        return view('login');
    }

    function auth(Request $req){

       $validate = $req->validate([
            'username' =>'required',
            'password' => 'required',
        ]);
        if($validate){
        $user = $req -> only('username','password');
        if(Auth::attempt($user)){ //login ho jayenga
            if(Auth::check()){
                 $user = Auth::user();



                Session::put('username', $user->username); // ✅ this is correct

                                  Session::put('userID',$user->id);

                                  return redirect('/dashboard');




            }
        }else{
           return redirect()->back();        }

        }else{
           return redirect()->back();        }
    }

    function register(){
        $pass='4567';
        $user = new Table_login;
        $user->username = 'payal';
        $user->email = 'payal@gmail.com';
        $user->password = Hash::make('4567');
        $user->save();


    }



    //
}
