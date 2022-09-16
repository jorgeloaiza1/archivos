<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Support\Facades\Input;
use EvaluationService;
use Debugbar;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
        return redirect('/');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        if (Input::get('denied') != '') {
            return redirect()->route('home')
                ->withErrors(['sociallite' => 'No compartiste tus datos de perfil con nuestra aplicación social.']);
        }

        $user = Socialite::driver('google')->user();        
        $userValidated = EvaluationService::validateGoogleUser($user);
        Debugbar::info($userValidated,$user);
        if(!empty($userValidated)){                      
            Auth::login($userValidated, true);
            return redirect()->route('home');
        }else{
          return redirect()->route('home')
                  ->withErrors(['sociallite' => 'Tu cuenta no esta permitida, para acceder a la plataforma.']);  
        }
    }
}
