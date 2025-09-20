<?php

namespace App\Services\Admission;

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
                'email' => $data['email'],
                'contact_number' => $data['contact_number'],
                'gender_id' => $data['gender'],
                'house_number' => $data['house_number'],
                'street' => $data['street'],
                'barangay_id' => $data['barangay'],
                'district_id' => $data['district'],
                'city' => $data['city'],
            ]);
        });

        return $admission;
    }
}