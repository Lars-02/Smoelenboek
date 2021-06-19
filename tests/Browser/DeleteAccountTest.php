<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\Browser\TestPreparations\DatabasePreparer;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\Log;

class DeleteAccountTest extends DuskTestCase
{

    public function setUp(): void
    {
        parent::setUp();
        foreach (static::$browsers as $browser) {
            $browser->driver->manage()->deleteAllCookies();
        }

        DatabasePreparer::migrate_seed_database();
        $this->assertTrue(true);
    }

    /**
     * admin kan account van een ander verwijderen
     *
     * @return void
     */
    public function test_admin_can_delete_other_accounts()
    {
        $this->browse(function ($browser){
            $browser->visit(env('APP_URL').'/login')
            ->type('email', 'admin@avans.nl')
            ->type('password', 'password')
            ->press('Inloggen')
            ->visit('/employee/58')
            ->press('Aanpassen')
            ->press('Account Verwijderen')
            ->press('Verwijderen')
            ->assertSee("Het account is succesvol verwijderd!");

            $url = $browser->driver->getCurrentURL();
            $this->assertEquals(env('APP_URL'), $url);
        });
    }

    public function test_user_cannot_delete_account()
    {
        $this->browse(function ($browser){
            $browser->visit(env('APP_URL').'/login')
                ->type('email', 'test@avans.nl')
                ->type('password', 'password')
                ->press('Inloggen')
                ->visit('/employee/102')
                ->press('Aanpassen')
                ->assertDontSee("Account Verwijderen");
        });
    }

}
