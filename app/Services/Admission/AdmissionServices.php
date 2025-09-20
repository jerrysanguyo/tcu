<?php

namespace App\Services\Admission;

use App\Models\Admission\AdmissionAcademic;
use App\Models\Admission\Applicant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdmissionServices
{
    public function admissionDetails(string $uuid): Applicant
    {
        return Applicant::with(['academic','guardian'])->where('uuid', $uuid)->firstOrFail();
    }

    public function store(array $data): Applicant
    {
        return DB::transaction(function () use ($data) {

            $applicant = Applicant::create([
                'uuid'           => (string) Str::uuid(),
                'first_name'     => $data['first_name'],
                'middle_name'    => $data['middle_name'] ?? null,
                'last_name'      => $data['last_name'],
                'email'          => $data['email'],
                'contact_number' => $data['contact_number'] ?? null,
                'birth_date'     => $data['birth_date'],
                'gender_id'      => $data['gender'],
                'house_number'   => $data['house_number'] ?? null,
                'street'         => $data['street'] ?? null,
                'barangay_id'    => $data['barangay'],
                'district_id'    => $data['district'],
                'city'           => $data['city'] ?? null,
            ]);

            $applicant->academic()->create([
                'jr_school' => $data['jr_school'],
                'jr_strand' => $data['jr_strand'] ?? null,
                'jr_gwa'    => $data['jr_gwa'],
                'sr_school' => $data['sr_school'],
                'sr_strand' => $data['sr_strand'] ?? null,
                'sr_gwa'    => $data['sr_gwa'],
            ]);

            $applicant->guardian()->create([
                'full_name'      => $data['full_name'],
                'contact_number' => $data['contact_number'] ?? null,
            ]);

            return $applicant->load(['academic','guardian']);
        });
    }
}