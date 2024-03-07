<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CurrentPasswordRule implements Rule
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
        // ユーザーがログインしているかを確認
        if (Auth::check()) {
            // ユーザーの現在のパスワードを取得
            $current_password = Auth::user()->password;

            // 入力されたパスワードが現在のパスワードと一致するかどうかを確認
            return Hash::check($value, $current_password);
        }

        return false;
    }
    

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '現在のパスワードが正しくありません。';
    }
}
