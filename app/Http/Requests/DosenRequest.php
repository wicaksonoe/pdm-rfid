<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DosenRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'nidn'         => 'bail|required|unique:mdosen,nidn',
                    'nama'         => 'bail|required',
                    'programstudi' => 'bail|required',
                ];
                break;

            case 'PUT':
            case 'PATCH':
                return [
                    'nidn' => [
                        'bail',
                        'required',
                        Rule::unique('mdosen')->ignore($this->nidn, 'nidn'),
                    ],
                    'nama'         => 'bail|required',
                    'programstudi' => 'bail|required',
                ];
                break;

            default:
                return [];
                break;
        }

    }

    /**
     * Error message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nidn.required'         => 'nidn tidak boleh kosong.',
            'nidn.unique'           => 'nidn sudah dipakai.',
            'nama.required'         => 'nama tidak boleh kosong.',
            'programstudi.required' => 'program studi tidak boleh kosong.',
        ];
    }
}