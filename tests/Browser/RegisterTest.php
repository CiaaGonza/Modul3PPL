<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(url:'/') //mengunjungi url halaman utama
            ->clickLink(link:'Register') //menekan tautan ‘Register’
            ->assertPathIs(path:'/register') //memastikan url setelah menekan tautan sebelumnya
            ->type(field:'name',value:'admin1') //mengisi input yang memiliki atribut name.
            ->type(field:'email',value:'test1@gmail.com') //mengisi input yang memiliki atribut email.
            ->type(field:'password',value:'password2') //mengisi input yang memiliki atribut password.
            ->type(field:'password_confirmation',value:'password2') //mengisi input yang memiliki atribut konfirmasi password.
            ->press('REGISTER'); //menekan tombol submit dari form
            
        });
    }
}