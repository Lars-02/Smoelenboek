<?php

namespace Tests\Browser;

use App\Models\Employee;
use App\Models\User;
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
            $browser->visit('http://127.0.0.1:8000/profile/testuser');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals('http://127.0.0.1:8000/login', $url);
        });
    }

    /**
     * A user can see the profile page when authenticated.
     */
    public function test_user_can_view_profile_page_when_authenticated()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                ->type('email', 'test@avans.nl')
                ->type('password', 'password')
                ->press('Inloggen')
                ->visit('/profile/testuser');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals('http://127.0.0.1:8000/profile/testuser', $url);
        });
    }

    /**
     * A user can see the sidebar nav when authenticated.
     */
    public function test_sidebar_nav_is_displayed()
    {
        $this->browse(function ($browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                ->type('email', 'test@avans.nl')
                ->type('password', 'password')
                ->press('Inloggen')
                ->visit('/profile/testuser')
                ->assertSee('Account')
                ->assertSee('Afdeling')
                ->assertSee('Werktijden')
                ->assertSee('Blokken')
                ->assertSee('Sociale Media');
        });
    }
}
