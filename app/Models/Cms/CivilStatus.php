<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class CivilStatus extends Model
{
    protected $table = 'civil_statuses';
    protected $fillable = [
        'name',
        'remarks'
    ];

    public static function getAllCivilStatuses()
    {
        return self::select('id', 'name', 'remarks')->get();
    }
}
