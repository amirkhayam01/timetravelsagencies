<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:superAdmin')->except('logout');
        $this->middleware('guest:superWriter')->except('logout');
    }

    public function superAdminLoginForm()
    {
        return view('auth.superAdmin-login', ['url' => 'admin']);
    }

    public function superAdminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('superAdmin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return "ok";
            // return redirect()->intended('/superadmin/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->roles()->first()->slug == 'admin') {
            return redirect('home');
        }
        // elseif($user->roles()->first()->slug == 'seller') {
        //     return redirect();
        // }
    }
}
