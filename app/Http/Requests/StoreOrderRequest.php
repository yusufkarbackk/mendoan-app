<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreOrderRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nomor'         => 'required|string|max:20',
            'alamat'       => 'required|string|max:255',
            'quantity'      => 'required|integer|min:1',
            'catatan'         => 'nullable|string|max:255',
            'payment_method'=> 'required|string|in:cash,transfer',
        ];
    }

    // protected function prepareForValidation(): void
    // {
    //     $this->merge([
    //         'nomor'       => Str::squish(strip_tags($this->address)),
    //         'alamat'       => Str::squish(strip_tags($this->address)),
    //         'catatan'         => $this->notes ? Str::limit(strip_tags($this->notes), 255) : null,
    //     ]);
    // }
}
