<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomeDuskTest extends DuskTestCase
{
    /**
     * A user cannot view the profile overview page without being authenticated.
     */
    public function test_user_cannot_view_profile_overview_page_when_not_authenticated()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://127.0.0.1:8000/');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals('http://127.0.0.1:8000/login', $url);
        });
    }

    /**
     * A user can see the profile overview page when authenticated into the system as an admin.
     */
    public function test_user_can_view_profile_overview_page_when_authenticated()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                ->type('email', 'test@avans.nl')
                ->type('password', 'password')
                ->press('Inloggen')
                ->visit('/');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals('http://127.0.0.1:8000/', $url);
        });
    }
}
