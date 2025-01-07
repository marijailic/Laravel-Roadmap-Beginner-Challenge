<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:50'],
            'body' => ['required', 'string', 'max:2048'],
            'category_id' => ['required', 'uuid', 'exists:categories,id'],
            'tags' => ['sometimes', 'array'],
            'tags.*' => ['required_with:tags', 'uuid', 'exists:tags,id'],
        ];
    }
}
