<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        $user = User::where('email', '=', $user->email)->first();
        if ($user === null) {
             $user = Socialite::driver('github')->user();
           
           $user = User::create([
               'email' => $user->email,
                'user_token' => $user->email,
                'name' => $user->nickname,
            ]);

            
        
        }
        //after login the user make auth to him 
        Auth::login($user);
        //after authentication redirect him to the index page 
       // Authentication passed...
       return redirect()->route('posts.index');
       
     
        
       
        // $user->token;
        
    }  

    public function ghandleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
       // dd($user);
       
        $user = User::where('email', '=', $user->name)->first();
       if ($user === null) {
          $user = Socialite::driver('google')->user();
           
           $user = User::create([
               'email' => $user->name,
              
            'name' => $user->name,
            'google' => $user->name,
           ]);

            
        
       }
        //after login the user make auth to him 
        Auth::login($user);
        //after authentication redirect him to the index page 
       // Authentication passed...
       return redirect()->route('posts.index');
       
     
        
       
        // $user->token;
        
    }
     


    public function gredirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    

    
   
}
