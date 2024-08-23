<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CheckPreviousPassword implements Rule
{
    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function passes($attribute, $value)
    {
        $user = User::where('email', $this->email)->first();
        if ($user && Hash::check($value, $user->password)) {
            return false; // The new password is the same as the old password
        }
        return true; // The new password is different
    }

    public function message()
    {
        return 'The new password must be different from your previous password.';
    }
}
