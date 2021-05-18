<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Equipo;
use App\Models\Factura;
use App\Models\Plan;
use App\Models\Ticket;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProjectSeeder::class);
        $this->call(NivelSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(RolSeedeer::class);
        $this->call(UserSeeder::class);
        $this->call(MediosSeeder::class);
        $this->call(TipoequipoSeeder::class);
        
        Cliente::factory(10)->create();
        Equipo::factory(10)->create();
        Factura::factory(10)->create();
        Ticket::factory(10)->create();
        
        $this->call(PlanSeeder::class);
        $this->call(MaterialSeeder::class);
        // $this->call(SedeSeeder::class);
        // $this->call(FacturaSeeder::class); 
        
        // $this->call(EquipoSeeder::class);
       // \App\Models\User::factory(10)->create();
        // $this->call(ClienteSeeder::class);
    }
}
