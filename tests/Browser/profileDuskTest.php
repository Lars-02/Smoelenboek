<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class profileDuskTest extends DuskTestCase
{
    /**
     * A user cannot view the register page without being authenticated.
     *
     * @return void
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
     * A user can see the registration page when authenticated into the system as an admin.
     *
     * @return void
     */
    public function test_user_can_view_register_page_when_authenticated()
    {
        $this->browse(function ($browser) {
            $user = User::find(21);
            $browser->loginAs($user)
                ->visit('/profile/testuser');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals('http://127.0.0.1:8000/profile/testuser', $url);
        });
    }
    public function test_user_can_click_side_nav()
    {
        $this->browse(function ($browser){
            $user = User::find(21);
            $browser->loginAs($user)
                ->visit('/profile/')
                    ->press('account')
                    ->press('afdeling')
                    ->press('werktijden')
                    ->press('blokken')
                    ->press('socialmedia');
        });
    }
}
