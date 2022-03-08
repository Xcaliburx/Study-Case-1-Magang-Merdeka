<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'group' => 'AI',
            'code' => 'FG001',
            'name' => 'Budi',
            'email' => 'budi@gmail.com',
            'password' => Hash::make('budi123'),
            'role' => 'Admin'
        ]);
        DB::table('users')->insert([
            'group' => 'CA',
            'code' => 'FH003',
            'name' => 'Andi',
            'email' => 'andi@gmail.com',
            'password' => Hash::make('andi123'),
            'role' => 'Member'
        ]);

    }
}
