<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class UserController extends Controller
{
    function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        //return $email . " " . $password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }else{
            return 'username dan password salah';
        }
        
    }  
    
    function register(request $request){
        //dd($request);
        $name = $request->name;
        if($name == null){
            return 'nama kosong';
        }

        $email = $request->email;
        if($email == null){
            return 'email kosong';
        }
        $password = $request->password;
        if($password == null){
            return 'password kosong';
        }
        $passwordconfirm = $request->passwordconfirm;
        if($passwordconfirm == $password){
            return 'password sama';
        }
    
        $data = User::where('email', $email)->first();
        if($data != null){
            return 'email sudah ada';
        }
        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->password = bcrypt($password);
        $user->save();

        $id = $user->id;
        Auth::loginUsingId($id);

        return redirect('dashboard');
    }

}
