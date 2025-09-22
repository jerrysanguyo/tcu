<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $table = 'religions';
    protected $fillable = [
        'name',
        'remarks'
    ];

    public static function getAllReligions()
    {
        return self::select('id', 'name', 'remarks')->get();
    }
}
