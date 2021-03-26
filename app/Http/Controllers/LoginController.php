<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    public function index() {
        return view('index');
    }


    public function login()
    {
        return view('auth.login');
    }


    public function adminLogin(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user->roles_name == 'Admin' || $user->roles_name == 'Supervisor') {

            $remember_me = $request->has('remember') ? true : false;

            if (auth()->attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {
                return redirect()->route('index');

            } else {
                return redirect()->back()->with('error', 'بيانات غير صحيحه من فضلك تأكد من صحه البيانات');
            }

        } else {
            return redirect()->route('login')->with('error', 'عفوا غير مسموح بالدخول لغير العاملين');
        }
    }


    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
