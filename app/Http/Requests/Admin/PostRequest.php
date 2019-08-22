<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'author_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'rating' => 'required|numeric',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'body' => 'required',
            'slug' => $this->request->get('_method') === 'POST' ? '' : 'required',
            'tag_ids' => 'nullable|array',
        ];
    }
}
