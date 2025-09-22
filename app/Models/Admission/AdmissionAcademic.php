<?php

namespace App\Models\Admission;

use App\Models\Cms\Strand;
use Illuminate\Database\Eloquent\Model;

class AdmissionAcademic extends Model
{
    protected $table = 'admission_academics';
    protected $fillable = [
        'applicant_id',
        'lrn',
        'jr_school',
        'jr_strand_id',
        'jr_year_graduated',
        'jr_gwa_first',
        'jr_gwa_second',
        'sr_school',
        'sr_strand_id',
        'sr_year_graduated',
        'sr_gwa_first',
        'sr_gwa_second',
    ];

    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }

    public function jrStrand()
    {
        return $this->belongsTo(Strand::class, 'jr_strand_id');
    }

    public function srStrand()
    {
        return $this->belongsTo(Strand::class, 'jr_strand_id');
    }
}
