<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected string $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        session()->put('previousUrl', url()->previous());

        return view('auth.customer.login');
    }
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectTo ()
    {
        return session('previousUrl', '/');
    }

}
