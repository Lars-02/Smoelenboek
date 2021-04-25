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
            $browser->visit(config('app.url'));
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals(config('app.url').'login', $url);
        });
    }

    /**
     * Authentication test.
     */
    public function test_user_can_view_profile_overview_page_when_authenticated()
    {
        $this->browse(function ($browser) {
            $browser->visit(config('app.url').'login')
                ->type('email', 'test@avans.nl')
                ->type('password', 'password')
                ->press('Inloggen')
                ->visit('/');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals(config('app.url'), $url);
        });
    }
}
