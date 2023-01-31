<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;

use App\Models\User;

class AuthenticationController extends Controller
{
    protected function authenticated(Request $request, $user) 
    {
        return redirect('/productos');
    }

    //
    public function showLogin() {
        return view('authentication.login');
    }

    public function login(LoginRequest $request) {
        $credentials = $request->getCredentials();
        
        if(!Auth::validate($credentials)):
           return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    public function showSignup(Request $request) {
        return view('authentication.signup');
    }

    public function signup(SignupRequest $request) {
        $userData = $request->validated();
        $user = User::create($userData);

        return redirect('/login')->with('success', 'Registro completado');
    }

    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('/login');
    }
}
