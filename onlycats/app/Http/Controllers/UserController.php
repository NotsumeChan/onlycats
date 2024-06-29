<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    function index(){
        return view('user.home');
    }

    function login(){
        return view('user.login');
    }

    function register(){
        return view('user.register');
    }

    function loging(Request $request){

        $credentials = [
            'name' => $request->name,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('producto.list');
        }

        return back()->withErrors([
            'name' => 'Problemas con el inicio de session (no se encontro el user)',
        ]);
    }

    function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = "";
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);

        return redirect()->route('producto.list');
    }

    function logout(){
        Auth::logout();
        return redirect()->route('/');
    }
}
