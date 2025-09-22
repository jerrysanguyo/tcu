<?php

namespace App\Models\Cms;

use App\Models\Admission\AdmissionChoice;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';
    protected $fillable = [
        'name',
        'remarks'
    ];

    public static function getAllPrograms()
    {
        return self::select('id', 'name', 'remarks')->get();
    }

    public function choice()
    {
        return $this->hasMany(AdmissionChoice::class, 'program_id');
    }
}
