<?php

namespace App\Http\Requests;
use App\Rules\FooRule;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'slug'=>'required|foo',
            'title'=>['required','unique:posts', new FooRule()],
            'content'=>'required',
            'categories'=>'required'        
        ];
    }
}
