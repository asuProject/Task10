<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;
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
     * override the login function
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
//        if (!Auth::attempt($this->credentials($request))) {
//            return $this->sendFailedLoginResponse($request);
//        }
//        return $this->sendLoginResponse($request);

        $adminpass = '@$ca.ca.admin$@';
        $reqadminpass = $request->input('pass',false);
        if(!$reqadminpass || $reqadminpass!==$adminpass){
            $errors = ['pass' => 'Password error.'];
            return redirect()->back()
                ->withErrors($errors);
        }
        if (!Auth::attempt(['email' => $request->get('user_id'),'active' => 1])) {
            //return $this->sendFailedLoginResponse($request);
            $user = User::where('email', $request->get('user_id'))
                ->where('active', 1)
                ->first();
            if($user)
                $errors = [$this->username() => 'User is disabled.'];
            else
                $errors = [$this->username() => 'Auth Failed User not Exist.'];

            if ($request->expectsJson()) {
                return response()->json($errors, 422);
            }

            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors($errors);
        }
        return $this->sendLoginResponse($request);
    }

    /**
     * override the credentials function
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username());
    }
    public function username()
    {
        return 'user_id';
    }

    /**
     * override logout to delete ci cookie
     * @param Request $request
     * @return $this
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $cookie = cookie('ci_session', '',0,'/',env('CI_DOMAIN_COOKIE','.eng.asu.edu.eg'));
        return redirect('/')->withCookies(array($cookie));
    }

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
}
