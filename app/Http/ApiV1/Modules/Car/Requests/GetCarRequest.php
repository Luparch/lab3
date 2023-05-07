<?php

namespace App\Http\ApiV1\Modules\Car\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetCarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['integer']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge(['id', $this->route('carId')]);
    }
}
