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

    public function reset(Request $request){
        $request->validate([ 
            'token' => 'required',
            'email' => 'required|email',
            'password' => [
                'required',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])(?!.*\s).{8,}$/'
            ],
            'password_confirmation' => 'required|same:password'
        ], [
            'token.required' => 'The token field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The new password field is required.',
            'password.regex' => 'The new password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, one special character, and must not contain spaces.',
            'password_confirmation.required' => 'The confirm password field is required.',
            'password_confirmation.same' => 'The confirm password must match the new password.'
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
