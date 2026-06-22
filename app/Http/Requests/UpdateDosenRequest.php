<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDosenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $dosen = $this->route('dosen');
        $dosenId = $dosen instanceof \App\Models\Dosen ? $dosen->id : $dosen;

        return [
            'nidn'       => 'required|string|size:18|unique:dosens,nidn,' . $dosenId,
            'nama_dosen' => 'required|string|max:255',
            'email'      => 'required|email|max:255|unique:dosens,email,' . $dosenId,
            'no_telp'    => 'required|string|max:15',
            'prodi_id'   => 'required|exists:prodis,id',
            'alamat'     => 'required|string',
        ];
    }
}
