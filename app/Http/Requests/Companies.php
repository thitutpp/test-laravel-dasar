<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Companies extends FormRequest
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
            'nama' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
            'logo' => 'required|image|mimes:png|dimensions:min_width="100px",min_height="100px"',
        ];
    }
}
