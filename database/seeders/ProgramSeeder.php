<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cms\Program;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            'Bachelor of Science in Information Technology',
            'Bachelor of Science in Computer Science',
            'Bachelor of Science in Business Administration',
            'Bachelor of Science in Accountancy',
            'Bachelor of Science in Nursing',
            'Bachelor of Science in Civil Engineering',
            'Bachelor of Science in Education',
            'Bachelor of Science in Psychology',
            'Bachelor of Science in Criminology',
            'Bachelor of Science in Hospitality Management',
        ];

        foreach ($programs as $program) {
            Program::firstOrCreate([
                'name' => $program,
                'remarks' => 'Available program',
            ]);
        }
    }
}