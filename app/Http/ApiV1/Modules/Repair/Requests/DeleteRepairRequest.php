<?php

namespace App\Http\ApiV1\Modules\Repair\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteRepairRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['integer']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge(['id', $this->route('repairId')]);
    }
}
