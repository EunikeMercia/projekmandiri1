<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index_login(){
        return view('auth.login');
    }
    public function index_register(){
        return view('auth.register');
    }

    public function store(Request $request){

        // dd($request);
        $validatedData = $request->validate([
            'username' => 'required|min:5|max:255',
            'password' => 'required|min:5|max:20|confirmed',
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()->with(['error' => 'The provided credentials do not match our records.']);

    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        return redirect('/login');
    }
}
