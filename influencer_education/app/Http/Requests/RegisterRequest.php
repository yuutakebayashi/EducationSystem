<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(){
        return [
            'name' => ['required', 'string', 'max:255'],
            'name_kana' => ['required', 'string', 'max:255', 'regex:/^[ァ-ヶー]+$/u'], // カタカナ以外の入力を許可しない
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8', 'confirmed'],
            'now_class' => ['integer'],
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *、
     * @return array<string, string>
     */
    public function messages(){
        return [
            'name.required' => '名前を入力してください。',
            'name.max' => '名前は255文字以内で入力してください。',
            'name_kana.required' => 'カナを入力してください。',
            'name_kana.max' => 'カナは255文字以内で入力してください。',
            'name_kana.regex' => 'カナはカタカナで入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メール形式で入力してください。',
            'email.max' => 'メールアドレスは255文字以内で入力してください。',
            'email.unique' => 'そのメールアドレスは既に使用されています。',
            'password.required' => 'パスワードを入力してください。',
            'password.min' => 'パスワードは少なくとも8文字以上で入力してください。',
            'password.confirmed' => 'パスワードが確認用パスワードと一致しません。',

            'password_confirmation.required' => 'パスワード確認を入力してください。',
            'password_confirmation.min' => 'パスワード確認は少なくとも8文字以上で入力してください。',
            'password_confirmation.confirmed' => 'パスワードが確認用パスワードと一致しません。',

            'now_class.integer' => 'クラス名は整数で入力してください。',
        ];
    }
}

