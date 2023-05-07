<?php

namespace App\Http\ApiV1\Modules\CarService\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetCarServiceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['integer']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge(['id', $this->route('serviceId')]);
    }
}
