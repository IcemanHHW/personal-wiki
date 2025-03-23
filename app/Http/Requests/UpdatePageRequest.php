<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'is_featured' => ['present', 'boolean'],
            'title' => ['required', 'string', 'min:3', 'max:100'],
            'main_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'content' => ['required', 'string', 'min:5', 'max:4294967296'],
        ];
    }

    public function attributes(): array
    {
        return [
            'is_featured' => __('page.label.is_featured'),
            'title' => __('page.label.title'),
            'main_image' => __('page.label.main_image'),
            'content' => __('page.label.content'),
        ];
    }
}
