<?php

namespace App\Models\Admission;

use App\Models\Cms\Program;
use Illuminate\Database\Eloquent\Model;

class AdmissionChoice extends Model
{
    protected $table = 'admission_choices';
    protected $fillable = [
        'applicant_id',
        'program_id',
        'remarks',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
