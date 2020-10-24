<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AbsensiRequest extends FormRequest
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
            'kodemk'      => 'bail|required',
            'kelas'       => 'bail|required',
            'nidn'        => 'bail|required',
            'hari'        => 'bail|required',
            'tanggal'     => 'bail|required',
            'checkin'     => 'bail|required',
            'checkout'    => 'bail|required',
        ];
        
        switch ($this->method()) {
            case 'POST':
                return $rule;
                break;
            case 'PUT':
                return $rule;
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
            'kode.required'         => 'kode mata kuliah tidak boleh kosong.',
            'kelas.required'        => 'kelas tidak boleh kosong.',
            'nidn.required'         => 'nidn tidak boleh kosong.',
            'hari.required'         => 'hari tidak boleh kosong.',
            'tanggal.required'      => 'tanggal tidak boleh kosong.',
            'checkin.required'      => 'checkin tidak boleh kosong.',
            'checkout.required'     => 'checkout tidak boleh kosong.',
        ];
    }
}