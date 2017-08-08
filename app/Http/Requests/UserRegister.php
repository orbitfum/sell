<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegister extends FormRequest
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
            'email' => 'email|unique:users,mail',
            'phone' => 'min:9|max:11|unique:users,mobile',
            'password' => 'min:6|max:50',
            'password_confirmed' => 'same:password',


        ];
    }

    public function messages()
    {

        return [

            'email.required' => 'שחכת לרשום אימייל',
            'email.unique' => 'האימייל כבר קיים במערכת',
            'email.email' => 'אנא הכנס אימייל תקין',
            'phone.required' => 'שחכת לרשום מספר פלאפון',
            'phone.unique' => 'מספר פלאפון כבר קיים במערכת',
            'phone.email' => 'אנא הכנס מספר פלאפון תקין',
            'password.min' => 'הסיסמה חייבת להכיל 6 תווים לפחות',
            'password.max' => 'הסיסמה ארוכה אנא בחר אחרת',
            'Passwordagin.same' => 'הסיסמאות לא תאומות',
        ];
    }
}
