<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Hash;
use Illuminate\Support\Str;
use App\Mail\PasswordResetSuccess;
use App\Rules\CheckPreviousPassword;
class ForgotPasswordController extends Controller
{
     /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('auth.forgetPassword');
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
      
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
          Mail::send('emails.forgetPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
  
          return back()->with('success', 'We have e-mailed your password reset link!');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm(Request $request,$token) {
        $reset_password = DB::table('password_resets')->where('token', $token)->first();
        if (!$reset_password) {
          // dd($reset_password);
        return view('auth.error_msg');
      }
         return view('auth.forgetPasswordLink', ['token' => $token]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {

        $request->validate([
          'token' => 'required',
          'email' => 'required|email',
          'password' => [
              'required',
              'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])(?!.*\s).{8,}$/',
              new CheckPreviousPassword($request->email)
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
         
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
                              // dd($updatePassword,$request->email,$request->token);
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
          $user =  $request->only('email', 'password', 'password_confirmation', 'token');
          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
          Mail::to($request->email)->send(new PasswordResetSuccess($user));
          return redirect('/')->with('success', 'Your password has been changed!');
      }
}
