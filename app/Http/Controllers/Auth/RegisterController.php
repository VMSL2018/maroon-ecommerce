<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone' => 'required|numeric|digits:11',
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'user_level' => [],
            ]);
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        
        $new_user = User::create([
            
            'name'          => $data['name'],
            'email'         => $data['email'],
            'phone_number'  => $data['phone'],
            'password'      => Hash::make($data['password']),
            'user_level'    => 3
        
        ]);
        
        $email  = $data['email'];
        $name   = $data['name'];  
        $phone  = $data['phone'];
        
        $mail = Mail::raw('Thank you for registering with MAROON', function ($message) {
            $message->to('akandshuvo@gmail.com','Shovon Rahman Shuvo')->subject('New Registration');
            $message->from('maroon.fashion.bd@gmail.com','MAROON');
        });
        
        
    	$user = "Maroon";  
		$pass = "Maroon123";  
		$sid = "MaroonBrandEng"; 
		$url="http://sms.sslwireless.com/pushapi/dynamic/server.php"; 
		$param="user=$user&pass=$pass&sms[0][0]=".$phone."&sms[0][1]=".urlencode("Welcome to Maroon.Thank you for registering with us")."&sid=$sid"; 
		$crl = curl_init(); 
		curl_setopt($crl,CURLOPT_SSL_VERIFYPEER,FALSE); 
		curl_setopt($crl,CURLOPT_SSL_VERIFYHOST,2); 
		curl_setopt($crl,CURLOPT_URL,$url);  
		curl_setopt($crl,CURLOPT_HEADER,0); 
		curl_setopt($crl,CURLOPT_RETURNTRANSFER,1); 
		curl_setopt($crl,CURLOPT_POST,1); 
		curl_setopt($crl,CURLOPT_POSTFIELDS,$param);     
		$response = curl_exec($crl); 
		curl_close($crl); 
		//echo "<pre>".$response."</pre>"; 
        
        
        
        return $new_user;
        
    }
}
