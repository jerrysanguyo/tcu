<?php

namespace App\Models\Cms;

use App\Models\Admission\AdmissionAcademic;
use Illuminate\Database\Eloquent\Model;

class Strand extends Model
{
    protected $table = 'strands';
    protected $fillable = [
        'name',
        'remarks'
    ];

    public static function getAllStrands()
    {
        return self::select('id', 'name', 'remarks')->get();
    }

    public function jrStrand()
    {
        return $this->hasMany(AdmissionAcademic::class, 'jr_strand_id');
    }

    public function srStrand()
    {
        return $this->hasMany(AdmissionAcademic::class, 'jr_strand_id');
    }
}
