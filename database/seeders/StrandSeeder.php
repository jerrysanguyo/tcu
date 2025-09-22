<?php

namespace Database\Seeders;

use App\Models\Cms\Strand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StrandSeeder extends Seeder
{
    public function run(): void
    {
        $strands = [
            [
                'name'  => 'ABM',
                'remarks'   => 'Accountancy, Business and Management Strand.',
            ],
            [
                'name'  => 'HUMSS',
                'remarks'   => 'Humanities and Social Sciences Strand.',
            ],
            [
                'name'  => 'STEM',
                'remarks'   => 'Sceience, Technology, Engineering and Mathematics Strands.',
            ],
            [
                'name'  => 'GAS',
                'remarks'   => 'General Academic Strand.',
            ],
        ];

        foreach($strands as $s) {
            Strand::firstOrCreate($s);
        }
    }
}
