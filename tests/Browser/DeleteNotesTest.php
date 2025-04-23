<?php
namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotesDeleteTest extends DuskTestCase
{
    /**
     * Test deleting a note.
     */
    public function testDeleteNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(url:'/') //mengunjungi url halaman utama
            ->clickLink(link:'Log in') //menekan tautan ‘Log in’
            ->assertPathIs(path:'/login') //memastikan url setelah menekan tautan sebelumnya
            ->type(field:'email',value:'admin@gmail.com') //mengisi input yang memiliki atribut name email.
            ->type(field:'password',value:'password') //mengisi input yang memiliki atribut name password.
            ->press('LOG IN') //menekan tombol submit dari form
                ->clickLink('Notes') // Masuk ke note page
                ->assertPathIs('/notes') // Memastikan berada di halaman notes
                ->assertSee('NEWER Test Note') // Memastikan judul note terlihat
                ->with('.div-note', function ($note) {
                    $note->assertSee('NEWER Test Note') // Memastikan note terdapat di kontainer yang benar
                        ->press('Delete'); // Mekllik tombol delete            
                    })
                ->assertDontSee('NEWER Test Note'); // Memastikan note sudah tidak ada
        });
    }
}