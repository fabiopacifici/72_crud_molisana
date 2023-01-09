<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateProductRequest extends FormRequest
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

     //     Rule::unique('users')->ignore($user->id)
     // required|unique:products,title|min:5|max:100
    public function rules()
    {
        //dd($this->product->id);
        return [
            'title' => [
                'required',
                Rule::unique('products')->ignore($this->product->id),
                'min:5',
                'max:100'
            ],
            'src' => 'nullable|max:255',
            'description' => 'nullable',
            'type' => 'nullable|max:20',
            'cooking_time' => 'nullable|max:10',
            'weight' => 'nullable|max:10'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Non puoi cancellare questo campo, il titolo é obbligatorio',
            'title.min' => 'Il titolo deve essere almeno :min caratteri',
            'title.max' => 'Il titolo deve essere almeno :max caratteri',
            'src.max' => "L'immagine puó essere massimo :max caratteri",
            'type.max' => 'Il tipo di pasta puó essere massimo :max caratteri',
            'cooking_time.max' => 'Il tempo di cottura puó essere massimo :max caratteri',
            'weight.max' => 'Il tempo di cottura puó essere massimo :max caratteri'

        ];
    }
}
