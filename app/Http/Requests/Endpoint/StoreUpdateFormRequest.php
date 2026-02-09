<?php

namespace App\Http\Requests\Endpoint;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFormRequest extends FormRequest
{
    private ?string $id = null;

    public function __construct(string $id = null)
    {
        parent::__construct();
        $this->id = $id;
    }

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

            'name'   => [
                'required', 'string', 'max:255',
                \Illuminate\Validation\Rule::unique('endpoints')->where('site_id', $this->id)
            ],

            'frequency'   => [
                'required', 'integer',
            ],

        ]; // return
    }
}
