<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $route = $this->route()->getName();
        $rules = [
            'admin.categories.store' => [
                'title.*' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            'admin.categories.update' => [
                'title.*' => 'required|string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]
        ];

        return $rules[$route];
    }

    public function attributes()
    {
        $validationRules = [];
        foreach (config('app.languages') as $key => $lang) {
            $validationRules['title.' . $key] = "Title ($lang)";
        }
        $validationRules['image'] = 'Image';
        return $validationRules;
    }
}
