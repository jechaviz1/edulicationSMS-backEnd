<p>Hello,</p>

<p>You have been registered on our site. Please click the link below to set your password:</p>
<p><a href="{{ route('password.reset', ['token' => $token, 'email' => $user->email]) }}">Set Your Password</a></p>
<p>Thank you!</p>