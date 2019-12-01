<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;
use App\Customer;
use App\Order;
use App\OrderProduct;
use Auth;
use Image;

class CustomerController extends Controller
{
  //protected $redirectTo = '/dashboard';
  /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
  {
      $this->middleware('auth:customer');
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $customer_id = auth('customer')->user()->id;
    $customer = Customer::find($customer_id);
    // $orders = OrderProduct::find('product_id');
      return view('customer.dashboard')->with('orders', $customer->orders);
  }

  public function edit()
  {
    // $customer = Customer::all();
    $customer = Customer::find(auth('customer')->user()->id);
    return view('customer.profile', compact('customer'));
  }

  public function update(Request $request)
  {
    $this->validate($request, array(
      'name' => 'required|min:3|max:100',
      // 'image' => 'nullable',
      'email' => 'sometimes|email',//|unique:customers',
      'city' => 'nullable|min:3|max:100',
      'province' => 'sometimes|nullable|min:3|max:100',
      'address' => 'sometimes|nullable|max:100',
      'postalcode' => 'sometimes|nullable|digits:5',
      'phone' => 'digits:10',
      'facebookid' => '',
      'twitterid' => '',
      'otherinfo' => 'sometimes|min:5|max:255',
  ));
      $customer = Customer::find(auth('customer')->user()->id);

      $customer->name = $request->input('name');
      // $customer->image = $request->input('image');
      $customer->email = $request->input('email');
      $customer->city = $request->input('city');
      $customer->province = $request->input('province');
      $customer->address = $request->input('address');
      $customer->postalcode = $request->input('postalcode');
      $customer->phone = $request->input('phone');
      $customer->facebookid = $request->input('facebookid');
      $customer->twitterid = $request->input('twitterid');
      $customer->otherinfo = $request->input('otherinfo');

       // if ($request->hasFile('image')) {
       //   $image = $request->file('image');
       //   $filename = time() . '.' . $image->getClientOriginalExtension();
       //   $location = public_path('images/customers/' . $filename);
       //   Image::make($image)->resize(800, 400)->save($location);
       //   $customer->image = $filename;
       // }

       $customer->save();

       $notification = array(
         'message' => 'Επιτυχής ανανέωση των στοιχείων σας!',
         'alert-type' => 'success'
       );
       return redirect()->route('customer.edit')->with($notification);
  }
}
    // public function showLoginForm(){
    //
    //   return view('customer.login');
    // }
    //
    // public function showRegistrationForm(){
    //   return view('customer.register');
    // }
    //
    // //login customer function
    // public function login(Request $request)
    // {
    //   // Validate the form data
    //   $this->validate($request, [
    //     'email'   => 'required|email',
    //     'password' => 'required|min:6',
    //   ]);
    //   // Attempt to log the user in
    //   if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    //     Auth::guard('customer')->login($customer);
    //     // if successful, then redirect to their intended location
    //     return redirect()->intended(route('customer.index'));
    //   }
    //   // if unsuccessful, then redirect back to the login with the form data
    //   return redirect()->back()->withInput($request->only('email', 'remember'));
    // }
    //
    // //register form action
    // public function register(Request $request){
    //   $this->validate($request, array(
    //     'name' => 'required',
    //     'email' => 'email|required|unique:customers',
    //     'password' => 'required|min:4',
    // ));
    // //dd($request->all());
    //
    //   $customer = new Customer;
    //
    //   $customer->name = $request->input('name');
    //   $customer->email = $request->input('email');
    //   $customer->password = bcrypt($request->input('email'));
    //
    //   $customer->save();
    //
    //   Auth::guard('customer')->login($customer);
    //
    //   return redirect()->route('customer.index');
    // }
    //
    // public function logout(){
    //   Auth::logout();
    //   return redirect()->back();
    // }
