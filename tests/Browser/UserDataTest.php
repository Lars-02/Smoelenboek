<?php

namespace Tests\Browser;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserDataTest extends DuskTestCase
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
     * bestaande gebruiker word bij inloggen geredirect naar home
     *
     * @return void
     */
    public function test_user_gets_redirected_to_home_when_not_first_logged_in()
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

}
