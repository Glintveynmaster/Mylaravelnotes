<?php

namespace TestLaravel\Http\Requests;

use TestLaravel\Http\Requests\Request;

class ContactRequest extends Request
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
            'name'=>'required',
            'email'=>'max:5|required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле :attribute обязательное к заполнению',
            'email.max'=>'максимальное количество символов - :max'
        ];
    }
}
