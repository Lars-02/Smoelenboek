<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProfileEditTest extends DuskTestCase
{

    use RefreshDatabase;
    /**
     * A standard user can view its own's profile edit page.
     *
     * @return void
     */
    public function test_view_edit_page_of_own_profile_as_standard_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });

    }

    /**
     * A standard user cannot view the profile edit page of a different user.
     * @return void
     */
    public function test_user_cannot_view_profile_edit_page()
    {

    }

    /**
     * A standard user can edit information on its own profile.
     * @return void
     */
    public function test_user_can_edit_own_profile()
    {

    }

    /**
     * When a user leaves an input field empty/blank, then, the editing of the profile fails.
     * @return void
     */
    public function test_user_edit_profile_fail()
    {

    }

    /**
     * A admin can edit the profile of any user.
     * @return void
     */
    public function test_admin_can_edit_profile_of_any_user()
    {

    }
}
