<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function redirectTo()
    {
        return url()->previous();
    }


    public function showLoginForm()
    {
        session(['url.intended' => url()->previous()]);

        return view('auth.customer.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $this->authenticated($request, Auth::user());
            return redirect()->back();
        }

        // Authentication failed...
        return $this->sendFailedLoginResponse($request);
    }
    protected function authenticated(Request $request, $user)
    {
        // Custom logic before redirecting (optional)
        // ...

        // Redirect to the intended URL or the default path after login
        return redirect()->intended(session('url.intended', $this->redirectPath()));
    }

}
