<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root= new Plan();
        $root-> id_plan ="002211";
        $root-> descripcion ="Plan pro con router adicional";
        $root-> cant_megas ="8";
        $root-> vel_subida ="2 megas";
        $root-> vel_bajada ="6 megas";
        $root-> fecha_inicio ="2020-01-02";
        $root-> canon ="68.200";
        $root-> globaal ="si";
        $root->save();

        $root= new Plan();
        $root-> id_plan ="002214CC";
        $root-> descripcion ="Plan 10 MEGAS";
        $root-> cant_megas ="10";
        $root-> vel_subida ="2 megas";
        $root-> vel_bajada ="8 megas";
        $root-> fecha_inicio ="2020-05-02";
        $root-> canon ="100.200";
        $root-> globaal ="si";
        $root->save();

        $root= new Plan();
        $root-> id_plan ="003214CC";
        $root-> descripcion ="Plan 50 MEGAS EN FIBRA ";
        $root-> cant_megas ="50";
        $root-> vel_subida ="50 megas";
        $root-> vel_bajada ="40 megas";
        $root-> fecha_inicio ="2020-08-02";
        $root-> canon ="500.200";
        $root-> globaal ="si";
        $root->save();
    }
}
