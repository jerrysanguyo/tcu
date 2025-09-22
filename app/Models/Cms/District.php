<?php

namespace App\Models\Cms;

use App\Models\Admission\Applicant;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected $fillable = [
        'name',
        'remarks'
    ];

    public static function getAllDistrict()
    {
        return self::select('id', 'name', 'remarks')->get();
    }

    public function barangay()
    {
        return $this->hasMany(Barangay::class, 'district_id');
    }

    public function applicant()
    {
        return $this->hasMany(Applicant::class, 'district_id');
    }
}
