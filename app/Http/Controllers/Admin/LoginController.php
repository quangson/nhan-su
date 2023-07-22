<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use function Termwind\ask;

class LoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        if ($request->session()->exists('user_admin')) {
            // user value cannot be found in session
            return redirect()->route('admin-index');
        }
        return view('Admin.login');
    }

    public function postFormLogin(Request $request)
    {
        if ($request->email == 'abc@gmail.com' && $request->password == '123123')
        {
            session()->put('user_admin', $request->email);
            return redirect()->route('admin-index');
        } else {
            return redirect()->route('admin-login');
        }
    }
}
