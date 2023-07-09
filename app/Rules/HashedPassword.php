<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class HashedPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Hash the password value
        $hashedValue = bcrypt($value);

        // Replace the original value with the hashed value
        request()->merge([$attribute => $hashedValue]);

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute could not be hashed.';

    }
}
