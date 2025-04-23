<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Log in')
                ->assertPathIs('/login')
                ->type('email', 'admin@gmail.com')
                ->type('password', 'password')
                ->press('LOG IN')
                ->assertPathIs('/dashboard')
                ->pause(500)

                // Klik dropdown user
                ->click('@user-dropdown-trigger')
                ->pause(500)

                // Klik tombol logout di dalam dropdown
                ->click('@logout-button') // ini diasumsikan kamu sudah tambahkan dusk="logout-button" di tombol logout
                ->pause(500)

                // Pastikan diarahkan kembali ke halaman home atau login
                ->assertPathIs('/')
                ->assertSee('Log in'); // memastikan tombol login terlihat lagi
        });
    }
}
