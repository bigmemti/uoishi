<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->is_admin || request()->user->id == auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:4|max:255',
            'prefix' => 'required_if:has_prefix,true'
        ];
    }

    public function validated($key = null, $default = null)
    {
        return ['user_id' => request()->user->id, 'title' => (request()->has_prefix)? request()->prefix . ' '. request()->separator .' ' . request()->title: request()->title];
    }
}
