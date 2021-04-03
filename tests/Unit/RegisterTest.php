<?php

namespace Tests\Unit;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{

    use DatabaseMigrations;
    use DatabaseTransactions;

    public function setUp() :void 
    {
        parent::setUp();
        $user = User::factory()->create(['email' => 'testUser@avans.nl', 'password' => 'password']);
    }
    /**
     * A user can see the registration page when authenticated into the system as an admin. 
     *
     * @return void
     */
    public function test_user_can_view_register_page_when_authenticated()
    {

        //1. Vind een manier om in te loggen
        //2. Visit register pagina
        $this->browse(function ($browser) {
            $browser->visit('http://127.0.0.1:8000/login')
            ->type('email', 'test@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit('http://127.0.0.1:8000/register');
            $this->assertTrue(true);
        });
    }

    /**
     * A user cannot see the registration page when authenticated into the system as a non admin. 
     *
     * @return void
     */
    public function test_user_cannot_view_register_page_when_authenticated()
    {

        //1. Log in als een standaard gebruiker
        //2. Visit register pagina
    }

    /**
     * A user cannot be registered when the email exists in the database. 
     *
     * @return void
     */
    public function test_user_cannot_view_register_page_when_not_authenticated() 
    {
            //1. Zonder ingelogd te zijn Visit register pagina
            $this->browse(function ($browser) {
                $browser->visit('http://127.0.0.1:8000/register');
                $this->assertTrue(true);
            });
    }

    /**
     * A user can be registered when the email does not exist in the database. 
     *
     * @return void
     */
    public function test_user_can_be_registered_when_not_existing_in_database() 
    {


    }

    /**
     * A user can be registered with a teacher role. 
     *
     * @return void
     */
    public function test_user_can_be_created_with_teacher_role() 
    {

    }

    /**
     * A user can be registered with a admin role. 
     *
     * @return void
     */
    public function test_user_can_be_created_with_admin_role() 
    {
    }
}
