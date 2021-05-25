<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\Browser\TestPreparations\DatabasePreparer;
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
     * A user cannot view the register page without being authenticated. 
     *
     * @return void
     */
    public function test_user_cannot_view_register_page_when_not_authenticated() 
    {
        $this->browse(function ($browser) {
            $browser->visit(env('APP_URL').'register');

            $url = $browser->driver->getCurrentURL();
            $this->assertEquals(env('APP_URL').'login', $url);
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
            $browser->visit(env('APP_URL').'login')
            ->type('email', 'admin@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit(env('APP_URL').'register');

            $url = $browser->driver->getCurrentURL();

            $this->assertEquals(env('APP_URL').'register', $url);
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
            $browser->visit(env('APP_URL').'login')
            ->type('email', 'test@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit(env('APP_URL').'register');

            $url = $browser->driver->getCurrentURL();

            $this->assertEquals(env('APP_URL'), $url);
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
            while(true)
            {
                $randomEmail = mt_rand().'admin@avans.nl';
                if(User::where('email', $randomEmail)->first() == null) break;
            }  
    
            $browser->visit(env('APP_URL').'login')
            ->type('email', 'admin@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit(env('APP_URL').'register')
            ->type('email', $randomEmail)
            ->press('Aanmaken');

            $url = $browser->driver->getCurrentURL();
            
            $this->assertEquals(env('APP_URL'), $url);
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
            while(true)
            {
                $randomEmail = mt_rand().'admin@avans.nl';
                if(User::where('email', $randomEmail)->first() == null) break;
            }        

            $browser->visit(env('APP_URL').'login')
            ->type('email', 'admin@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit(env('APP_URL').'register')
            ->type('email', $randomEmail)
            // ->type('isAdmin', 'true')
            // ->type('isAdmin', "on")
            // ->click('isAdmin')
            // ->toggle('#admin', 'on')
            // ->check('isAdmin') 2
            // ->check('#admin') 2
            // ->check('admin') 2
            // ->select('isAdmin')
            ->value('@select-admin', 'selected')
            // ->select('@select-admin', 'selected')
            // ->click('@select-admin', 'selected')
            ->press('Aanmaken');

            $url = $browser->driver->getCurrentURL();

            $this->assertEquals(env('APP_URL'), $url);
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
            while(true)
            {
                $randomEmail = mt_rand().'test@avans.nl';
                if(User::where('email', $randomEmail)->first() == null) break;
            }   

            $browser->visit(env('APP_URL').'login')
            ->type('email', 'admin@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit(env('APP_URL').'register')
            ->type('email', $randomEmail)
            ->press('Aanmaken')
            //Trying to create an account the second time with the same email.
            ->visit(env('APP_URL').'register')
            ->type('email', $randomEmail)
            ->press('Aanmaken');

            $url = $browser->driver->getCurrentURL();
            
            $this->assertEquals(env('APP_URL').'register', $url);
        });
    }
}
