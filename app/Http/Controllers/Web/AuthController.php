<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('web.auth.login');
    }
    public function showRegistrationForm()
    {
        return view('web.auth.register');
    }
    public function logout()
    {
        Auth::logout();
        return redirect(url('/login'));
    }

    public function showForgotPasswordForm()
    {
        return view('web.auth.forgot-password');
    }
    public function showResetPasswordForm()
    {
        return view('web.auth.reset-password');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'username' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect(url('dashboard'));
    }
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $checkMail = User::where('email', $request->email)->first();
        if ($checkMail) {
            $code = $this->generateCode();
            $checkMail->remember_token = $code;
            $checkMail->save();
            $name = $checkMail->name;
            $data = [];
            $data['name'] = $name;
            $data['code'] = $code;
            $to = $request->email;
            $subject = "Zuli reset password";
            $txt = '
                <div style="display:block;padding:15px;background-color:#fff">
                    <div>
                        Hi ' . $name . ',
                    </div>
                    <br>
                    <div>
                        We received a request to reset your Account password. <br>
                        Enter the following password reset code
                    </div>
                    <br>
                    <div>
                        <span style="background-color:lightblue;padding:10px;margin-top:20px; border:1px solid blue;color:#333;font-size:18px;font-weight:bold">
                            ' . $code . '
                        </span>
                    </div>
                </div>
                ';
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: " . " info@zuli.app " . " \r\n";
            $mailSent = mail($to, $subject, $txt, $headers);
            if ($mailSent) {
                return redirect(url('/reset-password'))->with('success', 'Password reset link sent!');
            } else {
                return back()->with('faild', 'Something wrong');
            }
        }
        return back()->with('faild', 'Email not found');
    }
    function generateCode()
    {
        $code = mt_rand(100000, 999999);
        if ($this->codeExists($code)) {
            return $this->generateCode();
        }
        return $code;
    }

    function codeExists($code)
    {
        return User::where('remember_token', $code)->exists();
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required',
        ]);

        $data = $request->token;
        $checkMail = User::where('email', $request->email)->first();
        if ($data   ==   $checkMail->remember_token) {

            return redirect(url('login'))->with('success', 'Password Changed Successfully');
        } else {
            return back()->with('faild', 'Wrong Code');
        }

        // $status = Password::reset(
        //     $request->only('email', 'password', 'password_confirmation', 'token'),
        //     function ($user, $password) {
        //         $user->forceFill(['password' => bcrypt($password)])->save();
        //     }
        // );

        // return $status === Password::PASSWORD_RESET
        //     ? redirect()->route('login')->with('status', 'Password reset successfully!')
        //     : back()->withErrors(['email' => [__($status)]]);
    }
}
