<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function goLogin()
    {
        return view('login.login');
    }

    public function goRegister()
    {
        return view('login.register');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $data = [
            'email' => $email,
            'password' => $password,
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('book.list');
        }else{
            session()->flash('login_error', 'Account not exist');
            return redirect()->route('login.goLogin');
        }
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        toastr()->success('Create account success please login');
        return redirect()->route('login.goLogin');
    }

    public function logOut()
    {
        Auth::logout();
        return redirect()->route('login.goLogin');
    }
}
