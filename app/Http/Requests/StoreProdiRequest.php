<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProdiRequest extends FormRequest
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
        return [
            'nama_prodi' => 'required|string|max:100|unique:prodis,nama_prodi',
            'jenjang'    => 'required|string|in:D3,D4',
            'keterangan' => 'nullable|string|max:255',
        ];
    }
}
