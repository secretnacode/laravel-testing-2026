<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class testRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // this checks if the request that calls this class should be authorized or not\
        // false for yes the user should be authorized to make this request
        // true for no the user can make this request even if the user is not authorized
        // baliktad no tanginangn yan ahahahaha
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // this will automatically fired up if this instance was called
        // this is for the validation
        return [
            'title' => 'required|string|max:10|min:2',
            'body' => 'required|string|min:10|max:20'
        ];
    }

    public function messages()
    {
        // this will rewrite the predefined message in the parent class, 
        // if the title is not passed, instead of return a "Title is required", 
        // it will return the new message "lagyan mo ng title tanga"
        return [
            'title.required' => 'lagyan mo ng title tanga',
            'title.string' => 'dapat string value to',
            'title.max' => ':max lng ang maximum chars dito',
            'title.min' => 'atleast :min is a required chars',

            'body.required' => 'lagyan mo ng title tanga',
            'body.string' => 'dapat string value to',
            'body.max' => ':max lng ang maximum chars dito',
            'body.min' => 'atleast :min is a required chars',
        ];
    }
}
