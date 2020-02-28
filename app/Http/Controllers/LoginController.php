<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdministrationRequest;
class LoginController extends Controller
{
    /**
     * Hiển thị view login quản trị
     */
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            // The adminstration is logged in...
            return redirect()->route('index.dashbroad');
        } else {
            return view('login.index');
        }
       
    }

    /**
     * Method $_POST Login
     * 
     */
    public function attempt(AdministrationRequest $request)
    {
        // $credentials = $request->only('email', 'password');
        $email      = $request->input('email');
        $password   = $request->input('password');
        $remember   = $request->input('remember_token');
        if(Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $remember)){
            // return redirect()->route('index.dashbroad');
            return redirect()->intended(route('index.dashbroad'))->with('success', 'Chào mừng bạn. '. Auth::guard('admin')->user()->name .' quay trở lại!');
        }
        // If Unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->with('error', 'Đăng nhập thất bại!');
    }
    /**
     * Method $_POST Login
     * Forgot Password administration
     * Send Email with link reset password new
     * Expires Email in 5 minute
     */
    public function forgot_password()
    {

    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('index.administration');
    }
}
