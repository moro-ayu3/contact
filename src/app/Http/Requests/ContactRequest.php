<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'postcode' => ['required', 'regex:/^[0-9]{3}-[0-9]{4}$/', 'max:8'],
            'address' => ['required', 'string', 'max:255'],
            'option' => ['required', 'max:120'], 
        ];
    }

    public function prepareForValidation()
    {
        $this->merge(['postcode' =>mb_convert_kana($this->postcode, 'as')]);
    }

    public function messages()
     {
         return [
             'last_name.required' => '名字を入力してください',
             'last_name.string' => '名字を文字列で入力してください',
             'last_name.max' => '名字を255文字以下で入力してください',
             'first_name.required' => '名前を入力してください',
             'first_name.string' => '名前を文字列で入力してください',
             'first_name.max' => '名前を255文字以下で入力してください',
             'gender.required' => '性別を選択してください',
             'email.required' => 'メールアドレスを入力してください',
             'email.string' => 'メールアドレスを文字列で入力してください',
             'email.email' => '有効なメールアドレス形式を入力してください',
             'email.max' => 'メールアドレスを255文字以下で入力してください',
             'postcode.required' => '郵便番号を入力してください',
             'postcode.regex:/^[0-9]{3}-[0-9]{4}$/' => '郵便番号を半角英数字3桁、ハイフンを挟み半角英数字4桁で入力してください',
             'postcode.max' => '郵便番号を8文字以下で入力してください',
             'address.required' => '住所を入力してください',
             'address.string' => '住所を文字列で入力してください',
             'address.max' => '住所を255文字以下で入力してください',
             'option.required' => 'ご意見を入力してください',
             'option.max' => 'ご意見を120文字以下で入力してください',
         ];
     }
}
