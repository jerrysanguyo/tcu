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

    public function messages(): array
    {
        return [
            'guardian_full_name.required' => 'The guardian’s full name is required in order to process the student’s admission.',
            'guardian_contact_number.required' => 'Please provide the guardian’s contact number so the school may reach them.',
            'guardian_contact_number.digits' => 'The guardian’s contact number must contain exactly 11 digits.',
            
            'first_name.required' => 'The applicant’s first name is required for admission.',
            'last_name.required'  => 'The applicant’s last name is required for admission.',
            
            'email.required' => 'An email address is required so the school can send official notifications.',
            'email.unique'   => 'This email address has already been registered with another applicant.',
            'email.email'    => 'Please provide a valid email address for official school correspondence.',
            
            'contact_number.required' => 'The applicant’s contact number is required for admission records.',
            'contact_number.digits'   => 'The applicant’s contact number must contain exactly 11 digits.',
            
            'birth_date.required' => 'The applicant’s date of birth must be provided.',
            'birth_date.before'   => 'The date of birth must be a valid past date.',
            
            'gender.required' => 'Please select the applicant’s gender.',
            'gender.exists'   => 'The selected gender option is invalid.',
            
            'house_number.required' => 'The applicant’s house number must be provided.',
            'street.required'       => 'The applicant’s street must be provided.',
            'city.required'         => 'The applicant’s city must be provided.',
            
            'district.required' => 'Please select a valid district for the applicant’s address.',
            'district.exists'   => 'The selected district is not recognized by the system.',
            
            'barangay.required' => 'Please select a valid barangay for the applicant’s address.',
            'barangay.exists'   => 'The selected barangay is not recognized by the system.',
            
            'jr_school.required' => 'The junior high school name must be provided.',
            'jr_strand.required' => 'Please specify the junior high strand.',
            'jr_strand.exists'   => 'The selected junior high strand is not valid.',
            'jr_gwa.required'    => 'The junior high general weighted average (GWA) is required.',
            'jr_gwa.between'     => 'The junior high GWA must be between 1.00 and 5.00.',
            
            'sr_school.required' => 'The senior high school name must be provided.',
            'sr_strand.required' => 'Please specify the senior high strand.',
            'sr_strand.exists'   => 'The selected senior high strand is not valid.',
            'sr_gwa.required'    => 'The senior high general weighted average (GWA) is required.',
            'sr_gwa.between'     => 'The senior high GWA must be between 1.00 and 5.00.',
        ];
    }
}