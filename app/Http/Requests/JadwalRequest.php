<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JadwalRequest extends FormRequest
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
        $rule = [
            'kodemk'     => 'bail|required',
            'kelas'      => 'bail|required',
            'nidn'       => 'bail|required',
            'hari'       => 'bail|required',
            'kode_hari'  => 'bail|required',
            'jam_in'     => 'bail|required',
            'jam_out'    => 'bail|required',
        ];
        
        switch ($this->method()) {
            case 'POST':
                return $rule;
                break;
            case 'PUT':
            case 'PATCH':
                return $rule;
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
            'nama.required'         => 'nama tidak boleh kosong.',
            'programstudi.required' => 'program studi tidak boleh kosong.',
        ];
    }
}