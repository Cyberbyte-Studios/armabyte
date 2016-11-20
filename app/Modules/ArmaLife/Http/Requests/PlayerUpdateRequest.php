<?php

namespace App\Modules\ArmaLife\Http\Requests;

use App\Http\Requests\Request;

class PlayerUpdateRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'uid' => 'required',
            'name' => 'required'
        ];
    }
}
