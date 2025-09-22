<?php

namespace App\Services\Admission;

use App\Models\Admission\Applicant;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdmissionServices
{
    public function admissionDetails(string $uuid): Applicant
    {
        return Applicant::with([
            'academic',
            'guardian',
            'choice.program',
        ])->where('uuid', $uuid)->firstOrFail();
    }

    public function store(array $data, ?UploadedFile $comelecFile): Applicant
    {
        return DB::transaction(function () use ($data, $comelecFile) {

            $applicant = Applicant::create([
                'uuid'              => (string) Str::uuid(),
                'first_name'        => $data['first_name'],
                'middle_name'       => $data['middle_name'] ?? null,
                'last_name'         => $data['last_name'],
                'email'             => $data['email'],
                'contact_number'    => $data['contact_number'],
                'birth_date'        => $data['birth_date'],
                'birth_place'       => $data['birth_place'],
                'gender_id'         => $data['gender'],
                'religion_id'       => $data['religion'] ?? null,
                'civil_id'          => $data['civil'] ?? null,
                'nationality'       => $data['nationality'],
                'ethnic_background' => $data['ethnic_background'] ?? '',
                'house_number'      => $data['house_number'],
                'street'            => $data['street'],
                'barangay_id'       => $data['barangay'],
                'district_id'       => $data['district'],
                'city'              => $data['city'],
                'zip_code'          => $data['zip_code'],
            ]);

            $applicant->academic()->create([
                'lrn'               => $data['lrn'],
                'jr_school'         => $data['jr_school'],
                'jr_strand_id'      => $data['jr_strand'] ?? null,
                'jr_year_graduated' => $data['jr_year_graduated'] ?? null,
                'jr_gwa_first'      => $data['jr_gwa_first'],
                'jr_gwa_second'     => $data['jr_gwa_second'],
                'sr_school'         => $data['sr_school'],
                'sr_strand_id'      => $data['sr_strand'] ?? null,
                'sr_year_graduated' => $data['sr_year_graduated'] ?? null,
                'sr_gwa_first'      => $data['sr_gwa_first'],
                'sr_gwa_second'     => $data['sr_gwa_second'],
            ]);

            $guardianPayload = [
                'full_name'      => $data['guardian_full_name'],
                'contact_number' => $data['guardian_contact_number'],
                'comelec_number' => $data['comelec_number'],
            ];

            if ($comelecFile instanceof UploadedFile) {
                if (! $comelecFile->isValid()) {
                    throw new \RuntimeException('Uploaded voter’s ID is not valid.');
                }

                $uuid = $applicant->uuid;
                $ext  = strtolower($comelecFile->getClientOriginalExtension() ?: 'bin');
                $name = "voters_id-{$uuid}.{$ext}";

                $storedPath = $comelecFile->storeAs(
                    "uploaded/admission/{$uuid}",
                    $name,
                    'public'
                );

                $publicUrlPath = "storage/{$storedPath}";
                $guardianPayload['voters_path'] = $publicUrlPath;
            }

            $applicant->guardian()->create($guardianPayload);

            foreach ([
                ['program_id' => $data['program_first']  ?? null, 'remarks' => 'first'],
                ['program_id' => $data['program_second'] ?? null, 'remarks' => 'second'],
                ['program_id' => $data['program_third']  ?? null, 'remarks' => 'third'],
            ] as $c) {
                if (!empty($c['program_id'])) {
                    $applicant->choice()->create($c);
                }
            }

            $applicant->status()->create(['status'=>'pending']);

            return $applicant->load(['academic', 'guardian', 'choice.program']);
        });
    }
}