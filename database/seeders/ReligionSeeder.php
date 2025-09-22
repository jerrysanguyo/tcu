<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cms\Religion;

class ReligionSeeder extends Seeder
{
    public function run(): void
    {
        $religions = [
            'Roman Catholic',
            'Iglesia ni Cristo',
            'Evangelical (Born Again)',
            'Islam',
            'Protestant',
            'Seventh-day Adventist',
            'Jehovah’s Witnesses',
            'Buddhism',
        ];

        foreach ($religions as $religion) {
            Religion::firstOrCreate([
                'name' => $religion,
                'remarks' => 'Common religion in the Philippines',
            ]);
        }
    }
}