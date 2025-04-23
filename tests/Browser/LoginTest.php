<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(url:'/') //mengunjungi url halaman utama
                    ->clickLink(link:'Log in') //menekan tautan ‘Log in’
                    ->assertPathIs(path:'/login') //memastikan url setelah menekan tautan sebelumnya
                    ->type(field:'email',value:'admin@gmail.com') //mengisi input yang memiliki atribut name email.
                    ->type(field:'password',value:'password') //mengisi input yang memiliki atribut name password.
                    ->press('LOG IN'); //menekan tombol submit dari form
        });
    }
}