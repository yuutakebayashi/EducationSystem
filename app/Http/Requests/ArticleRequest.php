<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
    public function rules()
    {
        return [
            'title' => 'required',
            'posted_date' => 'required | date',
            'article_contents' => 'required',
        ];
    }

    public function attributes()
{
    return [
        'title' => 'タイトル',
        'posted_date' => '投稿日時',
        'article_contents' => '本文',
    ];
}

public function messages() {
    return [
        'title.required' => ':attributeは必須項目です。',
        'posted_date.required' => ':attributeは必須項目です。',
        'article_contents.required' => ':attributeは必須項目です。',
        'posted_date.date' => ':attributeは:半角英数字で入力してください。',
    ];
}


}
