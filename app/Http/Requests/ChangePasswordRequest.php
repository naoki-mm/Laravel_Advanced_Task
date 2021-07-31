<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CurrentPasswordCheck;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if($this->path() == 'password\change') {
            return true;    
        // } else {
            // return false;
        // }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password_current' => ['required', new CurrentPasswordCheck()],
            'password_new' => 'required|string|min:6|confirmed|different:password_current',
            'password_new_confirmation' => 'required',       
        ];
    }
    
    public function messages()
    {
        return [
            
            'password_current.required' => '現在のパスワードを入力してください。',
            'password_new.different' => '現在のパスワードと新しいパスワードが同じです。',
            'password_new.required' => '新しいパスワードを入力してください。',
            'password_new_confirmation.required' => '確認用のパスワードを入力してください。',
            'password_new.min' => 'パスワードは6文字以上で設定してください。',
            'password_new.strig' => 'パスワードを正しく入力してください。',
            'password_new.confirmed' => '新しいパスワードと確認用パスワードが異なります。',
        ];
    }
}
