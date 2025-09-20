<?php

namespace App\Models\Cms;

use App\Models\Admission\Applicant;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table = 'genders';
    protected $fillable = [
        'name',
        'remarks'
    ];

    public static function getAllGenders()
    {
        return self::select('name', 'remarks')->get();
    }

    public function applicant()
    {
        return $this->hasMany(Applicant::class, 'gender_id');
    }
}
