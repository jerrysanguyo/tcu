<?php

namespace App\Models\Admission;

use Illuminate\Database\Eloquent\Model;

class AdmissionGuardian extends Model
{
    protected $table = 'admission_guardians';
    protected $fillable = [
        'applicant_id',
        'full_name',
        'contact_number',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}
