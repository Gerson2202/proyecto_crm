<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol= new Role();
        $rol-> name ="Super Admin";
        $rol-> description ="Full aceeso"; 
        $rol->save();
        $rol->permissions()->sync(['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25']);  
    }
}
