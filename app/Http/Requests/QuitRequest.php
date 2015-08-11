<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuitRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'quit_date' => 'required|date',
            'packs_per_week' => 'required|numeric',
            'cigarettes_per_pack' => 'required|numeric',
            'cost_per_pack' => 'required|numeric',
        ];
    }
}
