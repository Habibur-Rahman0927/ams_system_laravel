<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

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
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function login(Request $request)
    {
    
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $request['role'] = 'user';
        $request['status'] = true;

        $credentials = $request->only('email', 'password', 'role', 'status');
        if (Auth::attempt($credentials)) {

            return redirect()->route('welcome');
        }

        return redirect("user-login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(
            [
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'admin',
                'status' => true
            ],
            $request->get('remember'))
        ) {

            return redirect()->intended(route('dashboard'));
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
