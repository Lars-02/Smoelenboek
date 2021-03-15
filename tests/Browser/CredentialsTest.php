<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CredentialsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use RefreshDatabase;


    /* Super easy, self explanatory. we should be able to view the login form when not authenticated. */
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /* We try to go to the login page, this shouldn't be allowed when we are authenticated so we should be redirected
    back to the homepage. This may break when the redirection url is changed, or of course when the feature is broken.*/
    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        /*we use 'make' here instead of create, so we can use the User but it won't get saved in the database.*/
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/home');
    }

    /* We assert if a user is logged in after creating an account and logging in with these correct credentials..*/
    public function test_user_can_login_with_correct_credentials()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'nick-is-cool'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }

    /*We create a user in the database with a cool password, and we attempt to login with a dumb(different) password.
    We assert if the user is redirected back, if there is an error from the session, assert if password or email field
    doesn't have a bad input, and assert if the user is still a guest(so not logged in).  */
    public function test_user_cannot_login_with_incorrect_password()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('nick-is-cool'),
        ]);

        /*i used ->from() here to make sure the user is redirected back to the login page. (Otherwise the request
        would be made from nowhere, so the user would be redirected to a '/' url  */
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'dit-wachtwoord-is-fout-haha',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

}
