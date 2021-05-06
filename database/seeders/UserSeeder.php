<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root= new User(); //id-->1
        $root-> name ="SuperAdmin";
        $root-> email ="admin@gmail.com";
        $root-> password = bcrypt('1234567');
        $root-> profile_photo_path="profile-photos/avatar.jpeg";
        $root->save();
        $root->roles()->sync('1');


        $root= new User(); //id-->2
        $root-> name ="camilo soporte";
        $root-> email ="soporte1@gmail.com";
        $root-> password = bcrypt('1234567');
        $root-> profile_photo_path="profile-photos/avatar.jpeg";
        $root->save();

        $root= new User(); //id-->3
        $root-> name ="raul soporte";
        $root-> email ="soporte2@gmail.com";
        $root-> password = bcrypt('1234567');
        $root-> profile_photo_path="profile-photos/avatar.jpeg";
        $root->save();
    }
}
