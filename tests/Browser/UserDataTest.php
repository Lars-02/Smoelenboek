<?php

namespace Tests\Browser;

use Laravel\Dusk\Chrome;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserDataTest extends DuskTestCase
{

    use DatabaseMigrations, RefreshDatabase;
    
    public function setUp() :void 
    {
        parent::setUp();
        foreach (static::$browsers as $browser) {
            $browser->driver->manage()->deleteAllCookies();
        }
    }

    /**
     * bestaande gebruiker word bij inloggen geredirect naar home
     *
     * @return void
     */
    public function test_user_gets_redirected_to_home_when_not_first_login()
    {
        $this->browse(function ($browser) {        
            $browser->visit(env('APP_URL').'/login')
            ->type('email', 'test@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit(env('APP_URL').'/employee/create');

            $url = $browser->driver->getCurrentURL();

            $this->assertEquals(env('APP_URL').'/', $url);
        });
    }

    /**
     * nieuwe gebruiker word bij inloggen geredirect naar employee create
     *
     * @return void
     */
    public function test_user_gets_redirected_to_form_when_first_logged_in()
    {
        $user = User::factory(User::class)->make([
            'email' => 'taylor@laravel.com',
            'password' => bcrypt('password'),
        ]);

        Log::info('BESTAAT'.': '.$user->email.' Password:'.$user->password);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email',  $user->email)
                    ->type('password', 'password')
                    ->press('Inloggen');

            $url = $browser->driver->getCurrentURL();

            $this->assertEquals(env('APP_URL').'/employee/create', $url);
        });
    }


    /**
     * form correct ingevuld succesvol redirect naar home
     *
     * @return void
     */
    public function test_cant_see_form_not_loggedin()
    {
        $this->browse(function ($browser) {        
            $browser->visit(env('APP_URL').'/employee/create');

            $url = $browser->driver->getCurrentURL();

            $this->assertEquals(env('APP_URL').'/login', $url);
        });
    }

    /**
     * form correct ingevuld succesvol redirect naar home
     *
     * @return void
     */
}
