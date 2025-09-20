<?php

namespace App\Models\Cms;

use App\Models\Admission\Applicant;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    protected $table = 'barangays';
    protected $fillable = [
        'district_id',
        'name',
        'remarks'
    ];

    public static function getAllBarangay()
    {
        return self::select('name', 'remarks')->get();
    }

    public function district()
    {
       return $this->belongsTo(District::class, 'district_id'); 
    }

    public function applicant()
    {
        return $this->hasMany(Applicant::class, 'barangay_id');
    }
}
