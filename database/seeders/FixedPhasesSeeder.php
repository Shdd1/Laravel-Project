<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FixedPhasesSeeder extends Seeder
{
    public function run()
    {
        DB::table('fixed_phases')->insert([
            ['project_type' => 1, 'phase_name' => 'المرحله1'],
            ['project_type' => 1, 'phase_name' => 'المرحله2'],
            ['project_type' => 1, 'phase_name' => 'المرحله3'],
            ['project_type' => 1, 'phase_name' => 'المرحله4'],


            ['project_type' => 2, 'phase_name' => 'المرحله1'],
            ['project_type' => 2, 'phase_name' => 'المرحله2'],
            ['project_type' => 2, 'phase_name' => 'المرحله3'],
        


            ['project_type' => 3, 'phase_name' => 'المرحله1'],
            ['project_type' => 3, 'phase_name' => 'المرحله2'],
           
        ]);
    }
}
