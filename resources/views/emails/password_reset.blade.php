<p>Hello,</p>
<style>
    .btn{
        padding: 11.5px 20px;
    border-radius: 0.625rem;
    font-weight: 500;
    font-size: 15px;
    line-height: 20px;
    }
    .btn-primary{
        background-color: #CFF859;
    border-color: #CFF859;
    color: #111828;
    }
</style>
<p>You have been registered on our site. Please click the link below to set your password:</p>
<p><a href="{{ route('password.reset', ['token' => $token, 'email' => $user->email]) }}" style="background-color: #CFF859;color: #111828;padding: 10px;text-decortion:none;">Set Your Password</a></p>
<p>Thank you!</p>