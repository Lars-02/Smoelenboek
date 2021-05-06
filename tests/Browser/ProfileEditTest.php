<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProfileEditTest extends DuskTestCase
{

    use RefreshDatabase;
    
    public function setUp() :void 
    {
        parent::setUp();
        foreach (static::$browsers as $browser) {
            $browser->driver->manage()->deleteAllCookies();
        }
    }

    /**
     * A standard user can view its own's profile edit page.
     *
     * @return void
     */
    public function test_view_profile_edit_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->type('email', 'testableUser@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit('http://localhost/employee/22')
            ->press('Aanpassen');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals('http://localhost/employee/22/edit', $url);
        });
    }

    /**
     * A standard user cannot view the profile edit page of a different user.
     * @return void
     */
    public function test_user_cannot_view_profile_edit_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->type('email', 'testableUser@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit('http://localhost/employee/1/edit');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals('http://localhost/employee/1/edit', $url);
        });
    }

    /**
     * A standard user can edit information on its own profile.
     * @return void
     */
    public function test_user_can_edit_own_profile()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->type('email', 'test@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit('http://localhost/employee/21')
            ->press('Aanpassen')
            ->value('#firstname', 'newFirstName')
            ->value('#lastname', 'newLastName')
            ->value('#email', 'newEmail@avans.nl')
            ->value('#phoneNumber', 'newPhoneNumber')
            ->value('#linkedInUrl', 'linkedInUrl.nl');
            //TODO: add edit action of other tabs on profile
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals('http://localhost/employee/21/edit', $url);
        });
    }

    /**
     * When a user leaves an input field empty/blank, then, the editing of the profile fails.
     * @return void
     */
    public function test_user_edit_profile_fail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->type('email', 'test@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit('http://localhost/employee/21')
            ->press('Aanpassen')
            ->value('#firstname', );
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals('http://localhost/employee/21/edit', $url);
        });
    }

    /**
     * A admin can edit the profile of any user.
     * @return void
     */
    public function test_admin_can_edit_profile_of_any_user()
    {
        
    }
}
