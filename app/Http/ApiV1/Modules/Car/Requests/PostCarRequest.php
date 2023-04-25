<?php

namespace App\Http\ApiV1\Modules\Car\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['integer'],
            'brand' => ['string'],
            'model' => ['string'],
            'number' => ['string'],
            'owner' => ['string']
        ];
    }
}
