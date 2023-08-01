<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Hash;
use App\Models\User;
use  App\Mail\ForgotPasswordEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        if (!empty(Auth::check())) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin.dashboard');
            } elseif (Auth::user()->user_type == 2) {
                return redirect('teacher.dashboard');
            } elseif (Auth::user()->user_type == 3) {
                return redirect('student.dashboard');
            } elseif (Auth::user()->user_type == 4) {
                return redirect('parent.dashboard');
            }
        }
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }

    public function AuthLogin(Request $request)
    {
        $check = $request->only('email', 'password');
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt($check, $remember)) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');

            } elseif (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');

            } elseif (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');

            } elseif (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');

            }
        } else {
            return redirect()->back()->with('msg', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function forgotpassword()
    {
        return view('auth.forgot');
    }

    public function PostForgotpassword(Request $request)
    {
        $user = User::getEmailCheck($request->email);
        if (!empty($user)) {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordEmail($user));
            return redirect()->back()->with('success', 'Kiểm tra email và đổi mật khẩu !');
        } else {
            return redirect()->back()->with('msg', 'Email không tồn tại !');
        }
    }
    public function reset($remember_token)
    {
        $user = User::getToken($remember_token);
        if (!empty($user)) {
            $data['user'] = $user;
            return view('auth.reset', $data);
        } else {
            abort(404);
        }
    }
    public function PostReset($token, Request $request)
    {
        if ($request->password == $request->cpassword) {
            $user = User::getToken($token);
            $user->password=Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();
            return redirect(url(''))->with('success','Thay đổi mật khẩu thành công');
        } else {
            return redirect()->back()->with('msg', 'Mật khẩu không giống nhau  !');
        }
    }
}
