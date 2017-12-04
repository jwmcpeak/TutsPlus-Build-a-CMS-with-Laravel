<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkWithPage extends FormRequest
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
            'title' => 'required',
            'url' => 'required',
            'content' => 'required'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'You must enter a title.',
            'url.required' => 'You must enter a URL.',
            'content.required' => 'Please enter some content.',
            
        ];
    }
}
