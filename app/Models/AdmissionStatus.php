<?php

namespace App\Models;

use App\Models\Admission\Applicant;
use Illuminate\Database\Eloquent\Model;

class AdmissionStatus extends Model
{
    protected $table = 'admission_statuses';
    protected $fillable = [
        'applicant_id',
        'validated_by',
        'status',
        'remarks'
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }

    public function validatedBy()
    {
        return $this->belongsTo(User::class, 'validated_by');
    }
}
