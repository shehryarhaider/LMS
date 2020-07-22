<?php

namespace App\Http\Controllers\Auth;

use App\Configuration;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Mail;

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
    protected $redirectTo = '/dashboard';

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
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('login.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    private function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            Auth::user()->login_history()->create(['type' => 'Login', 'datetime' => date('Y-m-d H:i:s') ,'user_name' => Auth::user()->name]);

            // session work
            if(Auth::user()->last_session_id == null){
                Auth::user()->last_session_data = $request->last_login_details;
                Auth::user()->save();
            }
            // session work

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * verify's the code
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function verify(Request $request)
    {
        if ($request->session()->has('tmp_login')) {
            return view('login.verify');
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * checks the configuration if Two Factor is enabled or not and handles it occordingly
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function checkTwoFactor(Request $request)
    {
        $config = Configuration::where('key', 'two_factor_authentication')->first();

        if ($config->value == 1) {
            return $this->startTwoFactor($request);
        } else if ($config->value == 0) {
            return $this->login($request);
        }
    }

    /**
     * checks if the provided credentials are valid then redirects to Two Factor
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    private function startTwoFactor(Request $request)
    {
        if (Auth::once(['email' => $request->email, 'password' => $request->password])) {
            // is user is disabled throw him out
            if (Auth::user()->status == 0) {
                $request->session()->flush();
                return redirect()->route('login')->withErrors(['status' => 'Your User account has been disabled']);
            }
            $code = random_int(100000, 999999); // generates a random 6 digit code
            // places the username and password into the session
            $request->session()->put('tmp_email', $request->email);
            $request->session()->put('tmp_password', $request->password);
            $request->session()->put('tmp_code', $code);
            $request->session()->put('tmp_login', true);

            //sets the data for the email
            $data = [
                'code' => $code,
            ];

            //gets the email to send the code
            $sendEmail = $request->email;
            Mail::send('cms.mails.sendcode', $data, function ($m) use ($sendEmail) {
                $m->to($sendEmail);
            });

            return redirect()->route('verify');
        } else {
            return redirect()->back()->withErrors(['email' => 'Incorrect Login Credentials']);
        }
    }

    /**
     * checks if the proivded code is correct and begins the auth
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function validateTwoFactor(Request $request)
    {
        $verified = false; //holds the value to know of the user code is verified or not

        if ($request->code == $request->session()->get('tmp_code')) {
            $verified = true;

            $request['email'] = $request->session()->get('tmp_email');
            $request['password'] = $request->session()->get('tmp_password');

            $request->session()->forget('tmp_email');
            $request->session()->forget('tmp_password');
            $request->session()->forget('tmp_code');
            $request->session()->forget('tmp_login');
        } else {
            return redirect()->back()->withErrors(['code' => 'Your code is incorrect']);
        }

        if ($verified) {
            return $this->login($request);
        } else {
            return redirect()->back()->withErrors(['409' => 'An unexpected Erorr occured.']);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // enter a log
        Auth::user()->login_history()->create(['type' => 'Logout', 'datetime' => date('Y-m-d H:i:s') ,'user_name' => Auth::user()->name]);

        // session work
        // sets remember me cookie if available
        $cookieData = $request->cookie(Auth::getRecallerName());
        if ($cookieData) {
            Auth::user()->remember_token = substr($cookieData,2,60);
        } else {
            Auth::user()->remember_token = null;
        }

        $request->session()->getHandler()->destroy(Auth::user()->last_session_id);

        // sets both data to null
        Auth::user()->last_session_id = null;
        Auth::user()->last_session_data = null;
        Auth::user()->save();

        // session work

        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
