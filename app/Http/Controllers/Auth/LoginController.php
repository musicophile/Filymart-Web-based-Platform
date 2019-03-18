<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Business;
use App\user;
;
use App\GiftCardInfo;
use App\GiftPhoto;

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
    
        protected  $redirectTo = '/home';
    
  
       
 
 

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
     * Get the needed authorization credentials from the request.
     *
     * @param  
     * @return array
     */
    protected function credentials(Request $request)
    {
      $request['verified'] = 1;
        return $request->only(['email', 'password']);
       
    }

    public function authenticated(Request $request, $user)
    {
        if (!$user->verified) {
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        }elseif($user->verified == 2){
            return \redirect('/upload-product');
        }
        
        return redirect()->intended($this->redirectPath());
    }
   

}
