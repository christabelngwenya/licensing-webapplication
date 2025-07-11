<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

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

    public function login(Request $request)
{
    $input = $request->all();
    $this->validate($request, [
        'name' => 'required',
        'password' => 'required'
    ]);

    if (auth()->attempt(['name' => $input['name'], 'password' => $input['password']])) {
        // Update the last login timestamp
        auth()->user()->update(['last_login_at' => now()]);

        if (auth()->user()->is_admin == 1) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('home');
        }
    } else {
        return redirect()->route('login')->with('error', 'Invalid login credentials');
    }
}
}

