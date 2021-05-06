<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Proyecto= new Project();
        $Proyecto-> nombre ="Atencion al cliente";
        $Proyecto-> descripcion ="Tickets y llamadas reportadas";
        $Proyecto-> start ="2020-01-14";
       
        $Proyecto->save();

       
    }
}
