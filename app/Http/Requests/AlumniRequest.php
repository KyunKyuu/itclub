<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumniRequest extends FormRequest
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
            'name' => 'string|required',
            'work' => 'string|nullable',
            'study' => 'string|nullable',
            'place' => 'string|nullable',
             'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2000',
        ];
    }
}
