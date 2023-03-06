<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Auth;
use Illuminate\Support\Facades\Mail;

class InformationController extends Controller
{
    public function PackagesPage() {
      return view('information.packages');
    }
    public function HowToPage() {
      return view('information.howto');
    }
    public function BlogPage() {
      return view('information.blog');
    }
    public function AfilliatePage() {
      return view('information.affiliates');
    }
    public function PrivacyPage() {
      return view('information.privacy');
    }
    public function ServicesPage() {
      return view('information.services');
    }
    public function PersonalDataPage() {
      return view('information.personaldata');
    }
    public function TermsOfUsePage() {
      return view('information.termsofuse');
    }
    public function AboutPage() {
      return view('information.about');
    }
    public function HelpPage() {
        return view('information.help');
    }
    public function checkout()
    {
      return view('cart.checkout');
    }
    ////////////////////////////
    public function ContactPage()
    {
        return view('information.contact');
    }
    public function postContact(Request $request)
    {
      $this->validate($request, [
        'firstname' => 'required',
        'lastname' => 'required',
        'telephone' => 'required',
        'email' => 'required|email',
  			// 'subject' => 'min:3',
  			'message' => 'min:10']);
  		$data = array(
  			'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'telephone' => $request->telephone,
        'email' => $request->email,
  			'subject' => 'New Contact form',
  			'bodyMessage' => $request->message
  			);
  		Mail::send('emails.contact', $data, function($message) use ($data){
  			$message->from($data['email']);
  			$message->to('jordantsap@hotmail.gr');
  			$message->subject($data['subject']);
  		});
  		\Session::flash('success', 'Ευχαριστούμε, το μύνημα σας εστάλη!');
  		return redirect(route('contact'));
    }
}
