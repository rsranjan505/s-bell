<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;

class UserRule implements Rule
{
    public $userType;
    public function __construct( $userType)
    {
        $this->userType = $userType;
    }

    // /**
    //  * Run the validation rule.
    //  *
    //  * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
    //  */
    // public function validate(string $attribute, mixed $value, Closure $fail): void
    // {
    //    //
    // }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

       $user = User::where('mobile', $value)->where('user_type', $this->userType)->first();
        return $user ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be different.';
    }
}
