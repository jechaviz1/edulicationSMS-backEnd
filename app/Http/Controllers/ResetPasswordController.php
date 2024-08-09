<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Mail\PasswordResetSuccess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        $reset_password = DB::table('password_resets')->where('email', $request->email)->first();
        if (!$reset_password) {
            // dd($reset_password);
          return view('auth.error_msg');
        }

        return view('auth.passwords.reset')->with([
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    public function reset(Request $request)
    {
        
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);
  
        $status = Password::reset(
          $user =  $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );
       
        Mail::to($request->email)->send(new PasswordResetSuccess($user));
        
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
