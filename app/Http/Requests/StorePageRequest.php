<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'is_featured' => ['present', 'boolean'],
            'title' => ['required', 'string', 'min:3', 'max:100'],
            'game' => ['required', 'string', 'min:1', 'max:100'],
            'race' => ['string', 'min:1', 'max:100'],
            'class' => ['string', 'min:1', 'max:100'],
            'age' => ['string', 'min:0', 'max:2147483647'],
            'main_image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'content' => ['required', 'string', 'min:5', 'max:4294967296'],
        ];
    }

    public function attributes(): array
    {
        return [
            'is_featured' => __('page.label.is_featured'),
            'title' => __('page.label.title'),
            'game' => __('page.label.game'),
            'race' => __('page.label.race'),
            'class' => __('page.label.class'),
            'age' => __('page.label.age'),
            'main_image' => __('page.label.main_image'),
            'content' => __('page.label.content'),
        ];
    }
}
