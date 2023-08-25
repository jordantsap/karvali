<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\Plan;
use App\Models\Role;
use App\Models\Subscription;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm($membership_title = null)
    {
//        dd($membership_title);
        $roles = Role::whereIn('id', [3, 4, 5])
//            ->withTranslation()
            ->get();
//        $memberships = Membership::get();
        $plans = Plan::withTranslation()->get();

        return view('auth.register', compact('roles','plans', 'membership_title'));
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fullname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
//            'role' => [ 'required', 'integer'],
//            'membership_id' => [ 'required', 'integer'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'fullname' => $data['fullname'],
            'username' => $data['username'],
            'email' => $data['email'],
//            'plan_id' => $data['plan_id'],
            'password' => Hash::make($data['password']),
//            'role' => $data['role'],
//            'email_verified_at' => now(),
        ]);
        $user->assignRole($data['role']);

        // Create subscription
//        $plan = Plan::find($data['plan_id']);
        Membership::create([
            'user_id' => $user->id,
            'plan_id' => 1,
            'start_date' => now(),
            'end_date' => now()->addDays(30),
            'status' => 'active',
        ]);
        event(new Registered($user));
        event(new UserRegistered($user));

        return $user;
    }
}
