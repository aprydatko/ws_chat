<?php

namespace App\Http\Requests\MessageStatus;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'message_id' => 'required|integer|exists:messages,id',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
