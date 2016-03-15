<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\AuthException;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
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
            'surname' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'surname' => $data['surname'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'account_type' => 'BUYER',
        ]);
    }

    /**
     * User registration page.
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * Register a user account.
     *
     * @param Illuminate\Http\Request $request
     */
    public function postRegister(Request $request)
    {   
        $validator = $this->validator($request->all());

        if($validator->fails())
        {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput($request->input());
        }

        $this->create($request->all());

        return redirect('/');
    }

    /**
     * Open login page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Login a user.
     * 
     * @param  \Illuminate\Http\Request $request 
     * @return \Illuminate\Http\Response
     */
    public function postlogin(Request $request)
    {        
        $this->validateLogin($request);
        $this->attemptlogin($request);

        return redirect()->intended();
    }

    /**
     * Validate a user login request.
     * 
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request,[
                'email' => 'required',
                'password' => 'required'
            ],[
                'email.required' => 'Type in your email address.',
                'password.required' => 'Type in your password.'
            ]);
    }

    /**
     * Attempt to log a user in.
     * 
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    protected function attemptlogin($request)
    {
        if(! auth()->attempt($request->all(), $request->has('remember')))
        {                            
            throw new AuthException(redirect()->back()->withErrors(['auth' => 'Email/Password mismatch.']));
        }
    }

    /**
     * Log a user out.
     * 
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->logout();

        return redirect()->back();
    }
}
