<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class UserDataTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */


    // test 1 : pagina niet zichtbaar wanneer niet ingelogd 
    public function test_user_cant_view_form_when_not_logged_in()
    {        
        $response = $this->get('/employee/create');
        $response->assertRedirect('/login');
    }

    // test 2 : pagina zichtbaar wanneer eerste login 
    public function test_user_can_view_form_when_first_logged_in()
    {
        $user = User::factory(User::class)->make();

        $response = $this->actingAs($user)->get('/employee/create');

        $response->assertViewIs('employee.form');
    }

    // test 3 : pagina niet zichtbaar wanneer niet 1e keer inloggen
    public function test_user_cant_view_form_when_not_first_logged_in()
    {
        $user = User::factory(User::class)->create();
        $employee = new Employee;
        $employee->user_id = $user->id;
        $employee->save();

        $response = $this->actingAs($user)->get('/employee/create');

        $response->assertRedirect('/');
    }

}
