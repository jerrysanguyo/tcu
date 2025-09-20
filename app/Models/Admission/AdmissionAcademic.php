<?php

namespace App\Models\Admission;

use App\Models\Cms\Strand;
use Illuminate\Database\Eloquent\Model;

class AdmissionAcademic extends Model
{
    protected $table = 'admission_academics';
    protected $fillable = [
        'applicant_id',
        'jr_school',
        'jr_strand',
        'jr_gwa',
        'sr_school',
        'sr_strand',
        'sr_gwa',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }

    public function jrStrand()
    {
        return $this->belongsTo(Strand::class, 'jr_strand');
    }

    public function srStrand()
    {
        return $this->belongsTo(Strand::class, 'sr_strand');
    }
}
