<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class InventarioTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->clickLink('Ingresar')
            ->waitForText('Silcom SAS')
            ->type('email', 'admin@gmail.com')
            ->type('password', '1234567')
            ->click('@login-button')
            ->clickLink('Planes')
            ->click('@crearplan')
            ->waitForText('Datos del Plan')
            // ->visit('/Crm/Planes')
             ->type('id_plan', '34433445')
             ->type('descripcion', 'de prueba')
             ->type('cant_megas', '5')
             ->type('vel_subida', '5')
             ->type('vel_bajada', '6')
             ->type('fecha_inicio', '2020/02/04')
             ->type('canon', '233445')
             ->select('global', 'si')
             ->click('@planstore');
        });
    }
}
