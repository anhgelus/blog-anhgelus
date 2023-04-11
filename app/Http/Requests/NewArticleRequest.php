<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class NewArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|min:4',
            'content'=>'required',
            'slug'=>'required|regex:/^[a-z0-9\-]+$/',
            'tags'=>'required|array|exists:tags,id'
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
           'slug'=>$this->input('slug')?:Str::slug($this->input('title'))
        ]);
    }
}
