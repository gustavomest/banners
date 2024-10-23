<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'midia' => 'required|mimes:jpeg,png,jpg,gif,html,mp4,mov,ogg,qt|max:10000',
            'titulo' => 'required|string|max:255',
            'plataforma' => 'required|string|max:255',
            'campanha' => 'required|string|max:255',
            'formato' => 'required|string|max:255',
            'empresa' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
        ];
    }
}
