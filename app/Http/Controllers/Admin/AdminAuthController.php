<?php

namespace App\Http\Controllers\Admin;

use App\AdminUser;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends AdminController
{
	/**
	 * Open registering page.
	 */
    public function registerGet()
    {
    	return view('admin.auth.register');
    }

    /**
     * register a back-end user.
     * 
     * @param  App\Http\Requests $request
     * @return \Illuminate\Http\Response
     */
    public function registerPost(Request $request)
    {
    	$this->validate($request , [
            'username' => 'required|max:255|unique:admin_users',
            'email' => 'required|email|max:255|unique:admin_users',
            'fullname' => 'required|max:255',
            'password' => 'required|confirmed|min:6',
        ]);
        
        $this->create($request->all());

        return redirect('/admin/login')->with(['register-success' => 'Register successfully']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\AdminUser
     */
    protected function create(array $data)
    {
        return AdminUser::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'fullname' => $data['fullname'],
            'password' => $data['password']
        ]);
    }

    /**
     * Open admin login page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function loginGet()
    {
    	return view('admin.auth.login');
    }


    public function loginPost(Request $request)
    {
    	if (! Auth::guard($this->guard)->attempt($request->only('username', 'password'), $request->has('remember'))) 
        {
            return redirect()->back()
                            ->withErrors(['auth' => 'Username/Password mismatch.']);
        }

        return redirect()->intended('admin/dashboard');
    }
}
