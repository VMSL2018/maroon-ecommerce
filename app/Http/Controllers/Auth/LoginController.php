<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleFacebookProviderCallback()
    {
        $users = Socialite::driver('facebook')->user();

        $findUser = User::where('email',$users->getEmail())->first();
        
        if($findUser){
            
            Auth::login($findUser);
    
            return redirect('/');
            
        }else{
            
            $user_details = array();
            $user_details[] = $users->getId();
            $user_details[] = $users->getNickname(); // Not Available from Google
            $user_details[] = $users->getName();
            $user_details[] = $users->getEmail();
            $user_details[] = $users->getAvatar();
            
    
            $register_new_user = new User;
            $register_new_user->email                           =   $users->getEmail();
            $register_new_user->name                            =   $users->getName();
            $register_new_user->profile_image_url               =   $users->getAvatar();
            $register_new_user->password                        =   bcrypt($users->getEmail().$users->getName().$users->getId());
            $register_new_user->user_level                      =   3; // Customer  => 3;
            $register_new_user->phone_number                    =   rand(11111111111,99999999999); // Customer  => 3;
    
            $register_new_user->save();
    
            Auth::login($register_new_user);
    
            return redirect('/');
        }
    }
    
    
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleProviderCallback()
    {
        $users = Socialite::driver('google')->stateless()->user();
        
        $findUser = User::where('email',$users->getEmail())->first();
        
        if($findUser){
            
            Auth::login($findUser);
    
            return redirect('/');
            
        }else{
            
            $user_details = array();
            $user_details[] = $users->getId();
            $user_details[] = $users->getNickname(); // Not Available from Google
            $user_details[] = $users->getName();
            $user_details[] = $users->getEmail();
            $user_details[] = $users->getAvatar();
            
            //dd($user_details);
    
            $register_new_user = new User;
            $register_new_user->email                           =   $users->getEmail();
            $register_new_user->name                            =   $users->getName();
            $register_new_user->profile_image_url               =   $users->getAvatar();
            $register_new_user->password                        =   bcrypt($users->getEmail().$users->getName().$users->getId());
            $register_new_user->user_level                      =   3; // Customer  => 3;
            $register_new_user->phone_number                    =   rand(11111111111,99999999999); // Random Phone number if customer does not provide any phonenumber;
    
            $register_new_user->save();
    
            Auth::login($register_new_user);
    
            return redirect('/');
        }


    }
    
    
    
    
    
/*
|---------------------------------
|Log out
|---------------------------------
*/
    
    public function logout(Request $request) 
    {
        Auth::logout();
        return redirect('/');
    }
}
