<?php

namespace Tests\Browser;

use App\Models\User;
use Carbon\Carbon;
use Laravel\Dusk\Browser;
use Tests\Browser\TestPreparations\DatabasePreparer;
use Tests\DuskTestCase;

class ProfileEditTest extends DuskTestCase
{
    
    public function setUp() :void 
    {
        parent::setUp();
        foreach (static::$browsers as $browser) {
            $browser->driver->manage()->deleteAllCookies();
        }
    }

    /**
     * Test to prepare the database a single time. This preparation includes migrating and seeding te test database.
     *
     * @return void
     */
    public function test_setup_database()
    {
        DatabasePreparer::migrate_seed_database();
        $this->assertTrue(true);
    }

    /**
     * A standard user can view its own's profile edit page.
     *
     * @return void
     */
    public function test_view_profile_edit_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(env('APP_URL'))
            ->type('email', 'test@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit(env('APP_URL').'employee/102')
            ->press('Aanpassen');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals(env('APP_URL').'employee/102/edit', $url);
        });
    }

    /**
     * A standard user cannot view the profile edit page of a different user.
     * @return void
     */
    public function test_user_cannot_view_profile_edit_page()
    {
        $this->browse(function (Browser $browser) {
            $randomUser = User::inRandomOrder()->first();
            $browser->visit(env('APP_URL'))
            ->type('email', 'test@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit(env('APP_URL').'employee/'.$randomUser->id)
            ->visit(env('APP_URL').'employee/'.$randomUser->id.'/edit');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals(env('APP_URL').'employee/'.$randomUser->id, $url);
        });
    }

    /**
     * A standard user can edit information on its own profile.
     * @return void
     */
    public function test_user_can_edit_own_profile()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(env('APP_URL'))
            ->type('email', 'test@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit(env('APP_URL').'employee/102')
            ->press('Aanpassen')
            ->value('#firstname', 'newFirstName')
            ->value('#lastname', 'newLastName')
            ->value('#email', Carbon::now().'newEmail@avans.nl')
            ->value('#phoneNumber', 'newPhoneNumber')
            ->value('#linkedInUrl', 'linkedInUrl.nl')
            ->press('Account')
            ->press('Afdeling')
            ->press('Werkdagen')
            ->press('Blokken')
            ->press('Opslaan');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals(env('APP_URL').'employee/102/edit', $url);
        });
    }
    
    /**
     * A standard user can cancel editing information on its own profile.
     * @return void
     */
    public function test_user_can_cancel_an_edit()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(env('APP_URL'))
            ->type('email', 'test@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit(env('APP_URL').'employee/102')
            ->press('Aanpassen')
            ->pause(500)
            ->press('Annuleren');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals(env('APP_URL').'employee/102', $url);
        });
    }


    /**
     * When a user leaves an input field empty/blank, then, the editing of the profile fails.
     * @return void
     */
    public function test_user_edit_profile_fail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(env('APP_URL'))
            ->type('email', 'test@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit(env('APP_URL').'employee/102')
            ->press('Aanpassen')
            ->value('#firstname', '')
            ->press('Opslaan');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals(env('APP_URL').'employee/102/edit', $url);
        });
    }

    /**
     * A admin can edit the profile of any user.
     * @return void
     */
    public function test_admin_can_edit_profile_of_any_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(env('APP_URL'))
            ->type('email', 'admin@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit(env('APP_URL').'employee/1')
            ->press('Aanpassen')
            ->value('#firstname', 'newFirstName')
            ->value('#lastname', 'newLastName')
            ->value('#email', Carbon::now().'newEmail@avans.nl')
            ->value('#phoneNumber', 'newPhoneNumber')
            ->value('#linkedInUrl', 'linkedInUrl.nl')
            ->press('Opslaan');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals(env('APP_URL').'employee/1/edit', $url);
        });
    }
}
