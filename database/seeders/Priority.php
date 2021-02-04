<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Priority extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->insert([
            'type' => 'Low'
        ]);

        
        DB::table('priorities')->insert([
            'type' => 'Minor'
        ]);
            
        DB::table('priorities')->insert([
            'type' => 'Major'
        ]);
                
        DB::table('priorities')->insert([
            'type' => 'Critical'
        ]);
    }
}
