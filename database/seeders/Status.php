<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'type' => 'Planned'
        ]);

        
        DB::table('statuses')->insert([
            'type' => 'In Progress'
        ]);
            
        DB::table('statuses')->insert([
            'type' => 'Testing'
        ]);
                
        DB::table('statuses')->insert([
            'type' => 'Completed'
        ]);
    }
}
