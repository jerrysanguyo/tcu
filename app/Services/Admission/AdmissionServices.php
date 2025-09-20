<?php

namespace App\Services\Admission;

use App\Models\Admission\AdmissionAcademic;
use App\Models\Admission\Applicant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdmissionServices
{
    public function admissionDetails($uuid)
    {
        $admission = Applicant::where('uuid', $uuid)->firstOrFail();
        
        return $admission;
    }

    public function store(array $data)
    {
        $admission = DB::transaction(function() use ($data) {
            $applicant = Applicant::create([
                'uuid' => (string) Str::uuid(),
                'first_name' => $data['first_name'],
                'middle_name' => $data['middle_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'contact_number' => $data['contact_number'],
                'birth_date' => $data['birth_date'],
                'gender_id' => $data['gender'],
                'house_number' => $data['house_number'],
                'street' => $data['street'],
                'barangay_id' => $data['barangay'],
                'district_id' => $data['district'],
                'city' => $data['city'],
            ]);

            $applicant->academic()->create([
                'jr_school' => $data['jr_school'],
                'jr_strand' => $data['jr_stand'],
                'jr_gwa'    => $data['jr_gwa'],
                'sr_school' => $data['sr_school'],
                'sr_strand' => $data['sr_stand'],
                'sr_gwa'    => $data['sr_gwa'],
            ]);
        });

        return $admission;
    }
}