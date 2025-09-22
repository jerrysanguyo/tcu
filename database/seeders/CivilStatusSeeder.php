<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cms\CivilStatus;

class CivilStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            'Single',
            'Married',
            'Separated',
            'Widowed',
            'Annulled',
            'Divorced (recognized abroad)',
            'Common-law / Live-in',
        ];

        foreach ($statuses as $status) {
            CivilStatus::firstOrCreate([
                'name' => $status,
                'remarks' => 'Civil status option',
            ]);
        }
    }
}