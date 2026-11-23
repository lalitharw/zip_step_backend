<?php

namespace App\Http\Requests\Api;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ActivityPauseStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "activity_id" => "required|exists:activities,id,user_id," . auth()->user()->id,
            "pauses" => "required|array|min:1",
            "pauses.*" => "required|array",
            // "pauses.*.user_id" => "required|exists:users,id",
            "pauses.*.client_id" => "required|uuid",
            "pauses.*.pause_at" => "required|date",
            "pauses.*.resume_at" => "nullable|date"
        ];
    }
}
