<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'document_name'=>['required'],
            'form_values'=>['required'],
            'form_values.*.field_seq'=>['required'],
            'form_values.*.is_mandatory'=>['required'],
            'form_values.*.field_type'=>['required'],
            'form_values.*.field_name'=>['required'],
            'form_values.*.select_values'=>['required|array'],
        ];
    }
}
