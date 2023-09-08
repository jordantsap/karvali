<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Notification;

class AuthRequestController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
      $roles = Role::find([4,5,6]);

        return view('auth.auth-request', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
      $user = $this->validate($request,[
      'fullname' => 'required|string|max:255',
      'username' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      // 'role' => 'required|integer',
      'password' => 'required|string|min:6|confirmed',
      'tel' => 'required|string',
      'mobile' => 'nullable|string',
      'description' => 'nullable|string|max:255|min:5',
      'requestname' => 'required|string|max:100',
//      'type' => 'required|string',
      'category' => 'required|string',
      'newsletter' => 'integer'
    ]);

    $user = new User;
    $user->fullname = $request->fullname;
    $user->username = $request->username;
    $user->email = $request->email;
//    $user->role->attach($request->role);
    $user->assignRole($request->role);
    $user->password = Hash::make($request->password);
    $user->tel = $request->tel;
    $user->mobile = $request->mobile;
    $user->requestname = $request->requestname;
    $user->type = $request->type;
    $user->category = $request->category;
    $user->description = $request->description;
    $user->newsletter = $request->newsletter;

    $user->save();
    Notification::route('mail', 'jordantsap@hotmail.gr')->notify(new NewUserNotification($user));
    // return $user;
    $notification = array(
    'message' => 'Επιτυχημένη εγγραφή, Παρακαλώ ελέγξτε το E-Mail σας για περαιτέρω λεπτομέρειες. Θα επικοινωνήσουμε όσο το δυνατόν γρηγορότερα μαζί σας!',
    'alert-type' => 'info'
    );
    return redirect(url('/'))->with($notification);
    }
}
