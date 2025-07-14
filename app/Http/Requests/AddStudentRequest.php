<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:students,email',
            'age' => 'required|integer|min:18|max:30',
            'DOB' => 'required|date',
            'gender' => 'required|in:m,f,o',
            'score' => 'required|integer|min:0|max:100',
            'image' => 'nullable|image|mimes:png, jpg, gif|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Abe chutiye, naam likh na!!!',
            'email.requied' => 'Oye lodu, email dikhai nehi deta kya?',
            'age.max' => 'Abe bhosdike, tu over age hain. Bhag yaha se!!!',
            'gender.required' => 'Abe Kutte, gender check kara apna',
            'score.max' => 'Sale chutiye, tere baap ne paper check kiya tha kya?'
        ];
    }
}
