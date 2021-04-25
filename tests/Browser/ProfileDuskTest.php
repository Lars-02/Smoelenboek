<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProfileDuskTest extends DuskTestCase
{
    /**
     * A user cannot view the profile page without being authenticated.
     */
    public function test_user_cannot_view_profile_page_when_not_authenticated()
    {
        $this->browse(function ($browser) {
            $browser->visit(config('app.url').'profile/testuser');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals(config('app.url').'login', $url);
        });
    }

    /**
     * A user can see the profile page when authenticated.
     */
    public function test_user_can_view_profile_page_when_authenticated()
    {
        $this->browse(function ($browser) {
            $browser->visit(config('app.url').'login')
                ->type('email', 'test@avans.nl')
                ->type('password', 'password')
                ->press('Inloggen')
                ->visit('/profile/testuser');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals(config('app.url').'profile/testuser', $url);
        });
    }
}
