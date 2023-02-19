<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateValidationRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:cars|max:255',
            'name' => new Uppercase(),
            'founded' => 'required|integer|min:0|max:2021',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ];
    }
}
