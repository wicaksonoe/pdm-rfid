<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class MatkulRequest extends FormRequest
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
        $kodemk = $this->kodemk;
        $id = Request::segment(2);

        switch ($this->method()) {
            case 'POST':
                return [
                    'kodemk' => 'bail|required|unique:m_mk,kodemk',
                    'namamk' => 'bail|required',
                ];
                break;

            case 'PUT':
            case 'PATCH':
                return [
                    'kodemk' => [
                        'bail',
                        'required',
                        Rule::unique('m_mk')->where(function ($query) use ($kodemk, $id) {
                            return $query->where('kodemk', $kodemk)->where('id', '!=', $id);
                        }),
                    ],
                    'namamk' => 'bail|required',
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
            'kodemk.required' => 'Kolom kode mata kuliah tidak boleh kosong.',
            'kodemk.unique'   => 'Kode mata kuliah sudah digunakan.',
            'namamk.required' => 'Kolom nama mata kuliah tidak boleh kosong.',
        ];
    }
}
