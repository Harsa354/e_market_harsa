<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePelangganRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama_pelanggan' => 'required|max:50|string',
            'kode_pelanggan' => 'required|integer',
            'alamat' => 'required|max:200|string',
            'no_telp' => 'required|integer',
            'email' => 'required|max:255|string'
        ];
    }
}
