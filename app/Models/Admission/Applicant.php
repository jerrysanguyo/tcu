<?php

namespace App\Models\Admission;

use App\Models\Cms\Barangay;
use App\Models\Cms\District;
use App\Models\Cms\Gender;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $table = 'applicants';
    protected $fillable = [
        'uuid',
        'first_name',
        'middle_name',
        'last_name',
        'contact_number',
        'email',
        'birth_date',
        'gender_id',
        'house_number',
        'street',
        'barangay_id',
        'district_id',
        'city'
    ];

    public static function getApplicantAdmission($uuid)
    {
        return self::select('uuid','first_name','middle_name','last_name',
            'contact_number','email','gender_id','house_number','street','birth_date',
            'barangay_id','district_id','city')
        ->where('uuid', $uuid)->first();
    }

    public function academic()
    {
        return $this->hasOne(AdmissionAcademic::class, 'applicant_id');
    }

    public function guardian()
    {
        return $this->hasOne(AdmissionGuardian::class, 'applicant_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
