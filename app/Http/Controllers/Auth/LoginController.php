<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\UserRoles;
use App\Http\Controllers\Controller;
use App\UserAssignedRoles;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    public function redirectTo(){
        $role = Auth::user()->roles()->get();

        switch ($role[0]['roleType']) {
            case 'Student':
                    return 'admin';
                break;
            case 'Employee':
                    return 'projects';
                break; 
            default:
                    return 'login'; 
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
