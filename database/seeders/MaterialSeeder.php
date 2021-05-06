<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root= new Material();
        $root-> nombre ="cable utp";
        $root-> stock ="100";
        $root->save();

        $root= new Material();
        $root-> nombre ="rg-45";
        $root-> stock ="150";
        $root->save();

        $root= new Material();
        $root-> nombre ="chazo-plastico";
        $root-> stock ="399";
        $root->save();

        $root= new Material();
        $root-> nombre ="conectores";
        $root-> stock ="1300";
        $root->save();
    }
}
