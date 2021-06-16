<?php

namespace Database\Seeders;

use App\Models\Wimbox;
use Illuminate\Database\Seeder;

class WimboxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root= new Wimbox(); //id-->1
        $root-> nombre ="Sancayetano"; 
        $root->save();
    }
}
