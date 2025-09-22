<?php

namespace App\Http\Requests\Admission;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'guardian_full_name'        =>  'required|string|max:255',
            'guardian_contact_number'   =>  'required|string|digits:11',
            'first_name'                =>  'required|string|max:255',
            'middle_name'               =>  'nullable|string|max:255',
            'last_name'                 =>  'required|string|max:255',
            'email'                     =>  'required|email:rfc,dns|unique:applicants,email',
            'contact_number'            =>  'required|string|digits:11',
            'birth_date'                => 'required|date|before:today',
            'gender'                    =>  'required|integer|exists:genders,id',
            'house_number'              =>  'required|string|max:255',
            'street'                    =>  'required|string|max:255',
            'city'                      =>  'required|string|max:255',
            'district'                  =>  'required|integer|exists:districts,id',
            'barangay'                  =>  'required|integer|exists:barangays,id',
            'jr_school'                 =>  'required|string|max:255',
            'jr_strand'                 =>  'required|integer|exists:strands,id',
            'jr_gwa'                    =>  'required|decimal:2|between:1,5',
            'sr_school'                 =>  'required|string|max:255',
            'sr_strand'                 =>  'required|integer|exists:strands,id',
            'sr_gwa'                    =>  'required|decimal:2|between:1,5',
        ];
    }
}
