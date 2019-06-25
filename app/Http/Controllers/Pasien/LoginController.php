<?php

namespace App\Http\Controllers\Pasien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:pasien')->except(['logout']);
    }
    public function form()
    {
        return view('pasien.pasien-login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:4'
        ]);

        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];
        // Attempt to log the user in
        if (Auth::guard('pasien')->attempt($credential, false)){
        // If login succesful, then redirect to their intended location
            return redirect()->intended(route('pasien.home'));
        }

        // If Unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('username', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard('pasien')->logout();
        return redirect(route('pasien.login'));
    }
}
