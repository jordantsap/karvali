<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;

class SocialController extends Controller
{
  //FACEBOOK FUNCTIONS
  /**
   * Redirect the user to the GitHub authentication page.
   *
   * @return \Illuminate\Http\Response
   */
  public function redirectToFacebook()
  {
      return Socialite::driver('facebook')->redirect();
  }

  /**
   * Obtain the user information from GitHub.
   *
   * @return \Illuminate\Http\Response
   */
  public function handleFacebookCallback()
  {
      $user = Socialite::driver('facebook')->user();

      // $user->token;
  }

  //TWITTER FUNCTIONS
  /**
   * Redirect the user to the GitHub authentication page.
   *
   * @return \Illuminate\Http\Response
   */
  public function redirectToTwitter()
  {
      return Socialite::driver('twitter')->redirect();
  }

  /**
   * Obtain the user information from GitHub.
   *
   * @return \Illuminate\Http\Response
   */
  public function handleTwitterCallback()
  {
      $user = Socialite::driver('twitter')->user();

      // $user->token;
  }

  //GOOGLE FUNCTIONS
  /**
   * Redirect the user to the GitHub authentication page.
   *
   * @return \Illuminate\Http\Response
   */
  public function redirectToGoogle()
  {
      return Socialite::driver('google')->redirect();
  }

  /**
   * Obtain the user information from GitHub.
   *
   * @return \Illuminate\Http\Response
   */
  public function handleGoogleCallback()
  {
      $user = Socialite::driver('google')->user();

      // $user->token;
  }

    //LINKEDIN FUNCTIONS
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleLinkedinCallback()
    {
        $user = Socialite::driver('linkedin')->user();

        // $user->token;
    }
}
