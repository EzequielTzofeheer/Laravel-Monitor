<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

use Livewire\Attributes\Rule;

class StoreUpdateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'url'   => [
                'required',
                'url',
                'max:255',
                \Illuminate\Validation\Rule::unique('sites')->where('user_id', auth()->user()->id)
            ],

        ]; // return
    }
}
