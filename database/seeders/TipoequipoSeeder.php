<?php

namespace Database\Seeders;

use App\Models\Tipoequipo;
use Illuminate\Database\Seeder;

class TipoequipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root= new Tipoequipo(); //id-->1
        $root-> nombre ="ANTENA PARABOLICA"; 
        $root->save();
    }
}
