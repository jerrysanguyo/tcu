<?php

namespace Database\Seeders;

use App\Models\Cms\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    public function run(): void
    {
        $genders = [
            'male', 
            'female'
        ];

        foreach($genders as $g)
        {
            Gender::firstOrCreate([
                'name' => $g, 
                'remarks' => 'seeder generated'
            ]);
        }
    }
}