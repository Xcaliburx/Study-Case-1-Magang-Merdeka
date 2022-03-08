<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data')->insert([
            'user_id' => 2,
            'pp_pkb' => 'PP',
            'death' => 'Yes',
            'validuntil' => '2023',
            'disability' => 'Yes',
            'compensation' => 'No',
            'pensiun_baru' => 'Yes',
            'sev_svc' => 'No',
            'disability_baru' => 'Yes',
            'offset' => 'Yes',
            'offset_pensiun' => 'TRUE',
            'pensiun' => 'Yes',
            'offset_resign' => 'TRUE',
            'tambahan' => 'Yes',
            'offset_death' => 'TRUE',
            'resign' => 'Yes',
            'offset_disability' => 'TRUE',
            'action_plan' => 'Tes 123',
        ]);
    }
}
