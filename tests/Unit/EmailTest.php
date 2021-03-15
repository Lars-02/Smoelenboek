<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Tests\DuskTestCase;


class EmailTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    use RefreshDatabase;

    protected function passwordRequestRoute(): string
    {
        return route('password.request');
    }

    protected function passwordEmailGetRoute(): string
    {
        return route('password.email');
    }

    protected function passwordEmailPostRoute(): string
    {
        return route('password.email');
    }

    /*Check if the email is valid. */
    public function test_email_is_a_valid_email()
    {
        $response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), [
            'email' => 'invalid-email',
        ]);

        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');
    }

    public function test_email_is_a_required_field()
    {
        $response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), []);

        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');
    }

    /*We have to test if an user will receive an email when he tries to reset his password. */
    public function test_user_receives_an_email_with_a_password_reset_link()
    {
        Notification::fake();

        $user = User::factory()->create([
            'email' => 'nick@example.com',
        ]);

        $response = $this->post($this->passwordEmailPostRoute(), [
            'email' => 'nick@example.com',
        ]);

        $this->assertNotNull($token = DB::table('password_resets')->first());
        Notification::assertSentTo($user, ResetPassword::class, function ($notification, $channels) use ($token) {
            return Hash::check($notification->token, $token->token) === true;
        });

    }


}
