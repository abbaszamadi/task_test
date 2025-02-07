<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'title' => ['required', 'min:5', 'max:255'],
            'description'   => ['required', 'max:1024'],
            'user_id'       => ['required']
        ];
    }


    public function prepareForValidation()
    {
        $this->merge([
            'user_id'  => auth()->user()->id
        ]);
    }

}
