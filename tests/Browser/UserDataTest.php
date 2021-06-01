<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\Browser\TestPreparations\DatabasePreparer;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\Log;

class UserDataTest extends DuskTestCase
{

    // use DatabaseMigrations, RefreshDatabase;
    
    public function setUp() :void 
    {
        parent::setUp();
        foreach (static::$browsers as $browser) {
            $browser->driver->manage()->deleteAllCookies();
        }

        DatabasePreparer::migrate_seed_database();
        $this->assertTrue(true);
    }

    /**
     * bestaande gebruiker word bij bezoeken van de form pagina geredirect naar home
     *
     * @return void
     */
    public function test_user_gets_redirected_to_home_when_not_first_login()
    {
        $this->browse(function ($browser){        
            $browser->visit(env('APP_URL').'/login')
            ->type('email', 'test@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen');

            $url = $browser->driver->getCurrentURL();

            $this->assertEquals(env('APP_URL'), $url);
        });
    }

    /**
     * bestaande niet ingelogde gebruiker word bij bezoeken van de form pagina geredirect naar login
     *
     * @return void
     */
    public function test_user_gets_redirected_to_login_when_not_logged_in()
    {
        
        $this->browse(function ($browser) {
            $browser->visit(env('APP_URL').'/employee/create');

            $url = $browser->driver->getCurrentURL();
            $this->assertEquals(env('APP_URL').'login', $url);
        });
    }


    /**
     * nieuwe gebruiker word bij inloggen geredirect naar employee create
     *
     * @return void
     */
    public function test_user_gets_redirected_to_form_when_first_logged_in()
    {
        $user = User::factory()->create(['email' => mt_rand().'employee@avans.nl']);
        Log::info('BESTAAT'.': '.$user->email.' Password:'.$user->password);
        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email',  $user->email)
                    ->type('password', 'password')
                    ->press('Inloggen');
            $url = $browser->driver->getCurrentURL();

            $this->assertEquals(env('APP_URL').'employee/create', $url);
        });
    }

    /**
     * form correct ingevuld succesvol redirect naar home
     *
     * @return void
     */
    public function test_filled_in_form_correct()
    {
        $user = User::factory()->create(['email' => mt_rand().'employee@avans.nl']);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email',  $user->email)
                    ->type('password', 'password')
                    ->press('Inloggen')
                    ->visit('/employee/create')
                    ->type('firstname',  'Seraphia')
                    ->type('lastname', 'Jacobs')
                    ->type('phoneNumber', '0612345678')
                    ->check('departments[]')
                    ->check('roles[]')
                    ->check('expertises[]')
                    ->press('@select-day')
                    ->press('Afronden');

            $url = $browser->driver->getCurrentURL();

            $this->assertEquals(env('APP_URL'), $url);
        });
    }

    /**
     * form niet ingevuld blijft op /employee/create
     *
     * @return void
     */
    public function test_form_empty()
    {
        $user = User::factory()->create(['email' => mt_rand().'employee@avans.nl']);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email',  $user->email)
                    ->type('password', 'password')
                    ->press('Inloggen')
                        ->press('Afronden');

            $url = $browser->driver->getCurrentURL();

            $this->assertEquals(env('APP_URL').'employee/create', $url);
        });
        
    }

}
