<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\Browser\TestPreparations\DatabasePreparer;
use Tests\DuskTestCase;

class ProfileDuskTest extends DuskTestCase
{

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
     * A user cannot view the profile page without being authenticated.
     */
    public function test_user_cannot_view_profile_page_when_not_authenticated()
    {
        $this->browse(function ($browser) {
            $testUser = User::where('email', 'test@avans.nl')->first();
            $browser->visit(config('app.url').'employee/'.$testUser->id);
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
            $testUser = User::where('email', 'test@avans.nl')->first();
            $browser->visit(config('app.url').'login')
                ->type('email', $testUser->email)
                ->type('password', 'password')
                ->press('Inloggen')
                ->visit('/employee/'.$testUser->id);
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals(config('app.url').'employee/'.$testUser->id, $url);
        });
    }
}
