<?php

namespace Tests\Unit;

use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{

    public function setUp() :void 
    {
        parent::setUp();
        foreach (static::$browsers as $browser) {
            $browser->driver->manage()->deleteAllCookies();
        }
    }

    /**
     * A user cannot view the register page without being authenticated. 
     *
     * @return void
     */
    public function test_user_cannot_view_register_page_when_not_authenticated() 
    {
        $this->browse(function ($browser) {
            $browser->visit('http://127.0.0.1:8000/register');
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
            $browser->visit('http://127.0.0.1:8000/login')
            ->type('email', 'testAdmin@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit('http://127.0.0.1:8000/register');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals('http://127.0.0.1:8000/register', $url);
        });
    }

    /**
     * A user cannot see the registration page when authenticated into the system as a non admin. 
     *
     * @return void
     */
    public function test_user_cannot_view_register_page_when_authenticated()
    {

        $this->browse(function ($browser) {        
            $browser->visit('http://127.0.0.1:8000/login')
            ->type('email', 'testDocent@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit('http://127.0.0.1:8000/register');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals('http://127.0.0.1:8000/employee/create', $url);
        });
    }

    /**
     * A user can be registered with a teacher role, if the entered email does not exist in the database. 
     *
     * @return void
     */
    public function test_user_can_be_registered_with_teacher_role() 
    {
        $this->browse(function ($browser) {        
            $browser->visit('http://127.0.0.1:8000/login')
            ->type('email', 'testAdmin@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit('http://127.0.0.1:8000/register')
            ->type('email', 'newUser@avans.nl')
            ->press('Aanmaken');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals('http://127.0.0.1:8000/employee/create', $url);
        });
    }

    /**
     * A user can be registered with an admin role, if the entered email does not exist in the database. 
     *
     * @return void
     */
    public function test_user_can_be_registered_with_admin_role() 
    {
        $this->browse(function ($browser) {        
            $browser->visit('http://127.0.0.1:8000/login')
            ->type('email', 'testAdmin@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit('http://127.0.0.1:8000/register')
            ->type('email', 'newUser2@avans.nl')
            ->click('@select-admin')
            ->press('Aanmaken');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals('http://127.0.0.1:8000/employee/create', $url);
        });
    }

    /**
     * A user cannot be registered when the email exists in the database. 
     *
     * @return void
     */
    public function test_user_cannot_be_registered_when_existing_in_database() 
    {
        $this->browse(function ($browser) {        
            $browser->visit('http://127.0.0.1:8000/login')
            ->type('email', 'testAdmin@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit('http://127.0.0.1:8000/register')
            ->type('email', 'newUser3@avans.nl')
            ->press('Aanmaken')
            //Trying to create an account the second time with the same email.
            ->visit('http://127.0.0.1:8000/register')
            ->type('email', 'newUser3@avans.nl')
            ->press('Aanmaken');
            $url = $browser->driver->getCurrentURL();
            $this->assertEquals('http://127.0.0.1:8000/register', $url);
        });
    }
}
