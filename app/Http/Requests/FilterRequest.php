<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'name' => 'nullable|max:255',
            'name_comparison' => 'nullable|boolean',
            'email' => 'nullable|max:255',
            'email_comparison' => 'nullable|boolean',
            'age' => 'nullable|integer',
            'age_comparison' => 'nullable|in:' . implode(User::$allowed_comparisons, ','),
            'created_at' => 'nullable|date',
            'created_at_comparison' => 'nullable|in:' . implode(User::$allowed_comparisons, ',')

        ];
    }
}
