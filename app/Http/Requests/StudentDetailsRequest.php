<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\User;

class StudentDetailsRequest extends FormRequest
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
            'name' => [
                'required', 'min:3'
            ],
            'stu_index_no' => [
                'required', 'min:3'
            ],
            'stu_register_no' => [
                'required', 'min:3'
            ],
            'stu_full_name' => [
                'required', 'min:3'
            ],
            'stu_address_jaffna' => [
                'required', 'min:3'
            ],
            'stu_address_perment' => [
                'required', 'min:3'
            ],
            'stu_styding_year' => [
                'required'
            ],
            'stu_gender' => [
                'required'
            ],
            'stu_mobile' => [
                'required', 'min:3'
            ],
            'stu_prefix' => [
                'required'
            ],
            'stu_subject_1' => [
                'required'
            ],
            'stu_subject_2' => [
                'required'
            ],
            'stu_subject_3' => [
                'required'
            ]
        ];
    }
}
