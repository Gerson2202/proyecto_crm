<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Equipo;
use App\Models\Factura;
use App\Models\Plan;
use App\Models\Ticket;
use App\Models\Wimbox;
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
        
        // $this->call(WimboxSeeder::class);
        // Cliente::factory(1000)->create();
        // Equipo::factory(1000)->create();
        // Factura::factory(1000)->create();
        // Ticket::factory(1000)->create();
        
        // $this->call(PlanSeeder::class);
        // $this->call(MaterialSeeder::class);
        // $this->call(SedeSeeder::class);
        // $this->call(FacturaSeeder::class); 
        
        // $this->call(EquipoSeeder::class);
       // \App\Models\User::factory(10)->create();
        // $this->call(ClienteSeeder::class);
    }
}
