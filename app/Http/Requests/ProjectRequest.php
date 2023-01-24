<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name' => 'required|max:255|min:3',
            'client_name' => 'required|max:255|min:3',
            'summary' => 'required|max:255|min:3',
            'cover_image' => 'required|max:255|min:3',
        ];
    }
    public function messages(){


        return [
            'name.required' => 'Il nome è un campo obbligatorio',
            'name.max' => 'Il nome può avere al massimo :max caratteri',
            'name.min' => 'Il nome può avere al minimo :min caratteri',
            'client_name.required' => 'Il nome del cliente è un campo obbligatorio',
            'client_name.max' => 'Il nome del cliente può avere al massimo :max caratteri',
            'client_name.min' => 'Il nome del cliente può avere al minimo :min caratteri',
            'cover_image.required' => 'L\'immagine è un campo obbligatorio',
            'cover_image.max' => 'L\'immagine può avere al massimo :max caratteri',
            'cover_image.min' => 'L\'immagine può avere al minimo :min caratteri',
            'summary.required' => 'Il testo è un campo obbligatorio',
            'summary.max' => 'Il testo può avere al massimo :max caratteri',
            'summary.min' => 'Il testo può avere al minimo :min caratteri',
        ];
    }
}
