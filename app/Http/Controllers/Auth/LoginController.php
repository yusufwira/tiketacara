<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Gate;


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

    protected $name;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->redirectTo = route('home');
        // if (Gate::allows('isAdmin')) {
        //     $this->redirectTo = route('/home');
        // } else {
        //     $this->redirect()->guest('user/login');
        // }
        $this->middleware('guest')->except('logout');
        $this->name = $this->findname();
        if (Gate::allows('isAdmin')) {
            $redirectTo= '/home';
        }
        else if (Gate::allows('isAdminAcara')) {
            $redirectTo= '/home';
        } 
        else {
           $redirectTo= '/';
        }
    }



    // public function logout(Request $request) {
    //   Auth::logout();
    //   return redirect('/login');
    // }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/login');
    }

     public function findname()
    {
        $login = request()->input('');
 
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
 
        request()->merge([$fieldType => $login]);
 
        return $fieldType;
    }

     public function name()
    {
        return $this->name;
    }

}
