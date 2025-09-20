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
        return self::select('name', 'remarks')->get();
    }

    public function jrStrand()
    {
        return $this->hasMany(AdmissionAcademic::class, 'jr_strand');
    }

    public function srStrand()
    {
        return $this->hasMany(AdmissionAcademic::class, 'sr_stand');
    }
}
