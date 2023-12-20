<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function index()
    {
        if(isset($_COOKIE['user_id'])){
            $user_id=$_COOKIE['user_id'];
           $user= User::where('user_id', $user_id)->first();
            if($user){

                session()->put('user', $user);
                return redirect()->route('admin.home')->with('success' ,'Welcom to The Finance Management System');
            }
        }
        return view('User.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username'=> 'email|required',
            'password'=>'required'
        ]);
    $user= User::where('email', $request->username)
                                               ->OrWhere('username', $request
                                                            ->username)->first();

    if($user){
        if(Hash::check($request->password , $user->password)){

            if($request->remember){
                setcookie('user_id' ,$user->user_id ,time()+(86400 * 30),'/');
            }

            session()->put('user', $user);
            return redirect()->route('admin.home')->with('success' ,'Welcom to The Finance Management System');
        }else{
            return redirect()->back()->with('error' ,'Incorect User Name OR password');
        }

    } else{
                 return redirect()->back()->with('error' ,'Incorect User Name OR password');
    }
    }

    public function logout()
    {
        session()->flush();
        setcookie('user_id', "", time()-3600 ,'/');
        return redirect()->route('User.login');

    }
}
