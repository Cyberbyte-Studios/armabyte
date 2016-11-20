<?php

namespace App\Modules\ArmaLife\Http\Requests;

use App\Http\Requests\Request;

class HouseUpdateRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required'
        ];
    }
}
