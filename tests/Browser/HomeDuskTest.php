<?php

namespace Tests\Browser;

use Tests\Browser\TestPreparations\DatabasePreparer;
use Tests\DuskTestCase;

class HomeDuskTest extends DuskTestCase
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
