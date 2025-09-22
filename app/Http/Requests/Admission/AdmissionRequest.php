<?php

namespace App\Http\Requests\Admission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdmissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'guardian_full_name'        => ['required','string','max:255'],
            'guardian_contact_number'   => ['required','string','digits:11'],
            'comelec_number'            => ['required','string','max:100'],
            'comelec_file'              => ['required','file','mimes:jpg,jpeg,png,pdf','max:2048'],
            
            'first_name'                => ['required','string','max:255'],
            'middle_name'               => ['nullable','string','max:255'],
            'last_name'                 => ['required','string','max:255'],
            'email'                     => ['required','email:rfc,dns', Rule::unique('applicants','email')],
            'contact_number'            => ['required','string','digits:11'],
            'birth_date'                => ['required','date','before:today'],
            'birth_place'               => ['required','string','max:255'],
            
            'gender'                    => ['required','integer','exists:genders,id'],
            'religion'                  => ['required','integer','exists:religions,id'],
            'civil'                     => ['required','integer','exists:civil_statuses,id'],
            
            'nationality'               => ['required','string','max:255'],
            'ethnic_background'         => ['required','string','max:255'],
            'house_number'              => ['required','string','max:255'],
            'street'                    => ['required','string','max:255'],
            'district'                  => ['required','integer','exists:districts,id'],
            'barangay'                  => ['required','integer','exists:barangays,id'],
            'city'                      => ['required','string','max:255'],
            'zip_code'                  => ['required','digits:4'],
            
            'lrn'                       => ['required','digits:12'],
            'jr_school'                 => ['required','string','max:255'],
            'jr_strand'                 => ['required','integer','exists:strands,id'],
            'jr_year_graduated'         => ['required','regex:/^\d{4}$/'],
            'jr_gwa_first'              => ['required','numeric','between:1,5'],
            'jr_gwa_second'             => ['required','numeric','between:1,5'],

            'sr_school'                 => ['required','string','max:255'],
            'sr_strand'                 => ['required','integer','exists:strands,id'],
            'sr_year_graduated'         => ['required','regex:/^\d{4}$/'],
            'sr_gwa_first'              => ['required','numeric','between:1,5'],
            'sr_gwa_second'             => ['nullable','numeric','between:1,5'],
            
            'program_first'             => ['required','integer','exists:programs,id'],
            'program_second'            => ['required','integer','exists:programs,id','different:program_first'],
            'program_third'             => ['required','integer','exists:programs,id','different:program_first','different:program_second'],
        ];
    }

    public function attributes(): array
    {
        return [
            'gender'            => 'gender',
            'religion'          => 'religion',
            'civil'             => 'civil status',
            'district'          => 'district',
            'barangay'          => 'barangay',
            'lrn'               => 'LRN',
            'jr_strand'         => 'JHS strand',
            'sr_strand'         => 'SHS strand',
            'jr_year_graduated' => 'JHS year graduated',
            'sr_year_graduated' => 'SHS year graduated',
            'jr_gwa_first'      => 'JHS GWA (1st sem)',
            'jr_gwa_second'     => 'JHS GWA (2nd sem)',
            'sr_gwa_first'      => 'SHS GWA (1st sem)',
            'sr_gwa_second'     => 'SHS GWA (2nd sem)',
            'program_first'     => 'first choice program',
            'program_second'     => 'second choice program',
            'program_third'     => 'third choice program',
            'comelec_file'      => 'voter’s ID file',
        ];
    }

    public function messages(): array
    {
        return [
            'guardian_full_name.required' => 'The guardian’s full name is required in order to process the student’s admission.',
            'guardian_contact_number.required' => 'Please provide the guardian’s contact number so the school may reach them.',
            'guardian_contact_number.digits' => 'The guardian’s contact number must contain exactly 11 digits.',

            'comelec_number.required' => 'Please provide the COMELEC / Voter’s number.',
            'comelec_file.required'   => 'Please upload a clear copy of the voter’s ID.',
            'comelec_file.mimes'      => 'The voter’s ID must be a JPG, PNG, or PDF file.',
            'comelec_file.max'        => 'The voter’s ID must not be larger than 2MB.',

            'email.required' => 'An email address is required so the school can send official notifications.',
            'email.unique'   => 'This email address has already been registered with another applicant.',
            'email.email'    => 'Please provide a valid email address for official school correspondence.',

            'contact_number.required' => 'The applicant’s contact number is required for admission records.',
            'contact_number.digits'   => 'The applicant’s contact number must contain exactly 11 digits.',

            'birth_date.required' => 'The applicant’s date of birth must be provided.',
            'birth_date.before'   => 'The date of birth must be a valid past date.',
            'birth_place.required'=> 'The place of birth is required.',

            'gender.required' => 'Please select the applicant’s gender.',
            'gender.exists'   => 'The selected gender option is invalid.',

            'district.required' => 'Please select a valid district for the applicant’s address.',
            'district.exists'   => 'The selected district is not recognized by the system.',
            'barangay.required' => 'Please select a valid barangay for the applicant’s address.',
            'barangay.exists'   => 'The selected barangay is not recognized by the system.',

            'nationality.required' => 'The applicant’s nationality must be provided.',
            'zip_code.digits'      => 'The ZIP code must be exactly 4 digits.',

            'lrn.required' => 'The LRN is required.',
            'lrn.digits'   => 'The LRN must be exactly 12 digits.',

            'jr_school.required' => 'The junior high school name must be provided.',
            'jr_gwa_first.required' => 'The junior high GWA (1st sem) is required.',
            'jr_gwa_second.required'=> 'The junior high GWA (2nd sem) is required.',
            'jr_gwa_first.between'  => 'The junior high GWA (1st sem) must be between 1.00 and 5.00.',
            'jr_gwa_second.between' => 'The junior high GWA (2nd sem) must be between 1.00 and 5.00.',

            'sr_school.required' => 'The senior high school name must be provided.',
            'sr_gwa_first.required' => 'The senior high GWA (1st sem) is required.',
            'sr_gwa_second.required'=> 'The senior high GWA (2nd sem) is required.',
            'sr_gwa_first.between'  => 'The senior high GWA (1st sem) must be between 1.00 and 5.00.',
            'sr_gwa_second.between' => 'The senior high GWA (2nd sem) must be between 1.00 and 5.00.',

            'program_first.required' => 'Please select your first choice program.',
            'program_second.different' => 'Your second choice must be different from your first choice.',
            'program_third.different'  => 'Your third choice must be different from your other choices.',
        ];
    }
}