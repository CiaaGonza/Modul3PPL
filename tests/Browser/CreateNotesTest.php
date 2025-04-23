<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNotesTest extends DuskTestCase
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
            ->press('LOG IN') //menekan tombol submit dari form
            ->clickLink(link:'Notes') //menekan tautan ‘Log in’
            ->assertPathIs(path:'/notes') //memastikan url setelah menekan tautan sebelumnya
            ->clickLink('Create Note') //menekan tombol submit dari form
            ->assertPathIs(path:'/create-note') //memastikan url setelah menekan tautan sebelumnya
            ->type(field:'title',value:'Test Note') //mengisi input yang memiliki atribut name title.
            ->type(field:'description',value:'This is a test note.') //mengisi input yang memiliki atribut name description.
            ->press('CREATE');//menekan tombol submit untuk menyimpan catatan baru
        });
    }
}