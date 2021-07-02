<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ImplicitRule;

class TokyoAddress implements ImplicitRule
{
    private $pref;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($pref)
    {
        $this->pref = $pref;
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
        if ($this->pref === '東京都' && blank($value)) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '東京都の場合は住所を入力してください。';
    }
}
