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

}
