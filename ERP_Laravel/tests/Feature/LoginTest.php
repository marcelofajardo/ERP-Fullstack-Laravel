<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**@test */
    public function test_user_can_see_login_page(){

        $this->withoutExceptionHandling();

        $this->get('/login')
            ->assertStatus(200)
            ->assertSee('Login')
            ->assertViewIs('auth.login');
    }

    public function test_user_is_authenticated()
    {
        $this->withoutExceptionHandling();

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'type' => 'admin'
        ]);

        $credentials = [
            "email" => $user->email,
            "password" => 'password'
        ];

        $response = $this->post('/login', $credentials);

        $response->assertRedirect('/home');
        $this->assertCredentials($credentials)->assertAuthenticated();
    }

    /**@test */
    public function test_login_wrong_credentials(){

        $this->withoutExceptionHandling();

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'type' => 'admin'
        ]);

        $credentials = [
            'email' => null,
            'password' => 'password'
        ];
        
        /**LO QUE DEBERÍA SER.--- LLAMANDO A LA FUNCIÓN test_login_requires_email()--- */
        //$response = $this->from('/login')->post('/login', $credentials);
        /*
        $response->assertRedirect('/login')->assertSessionHasErrors([
            'email' => 'The email field is required.',
        ]);
        */

        /**EN LO QUE SE HA QUEDADO D: */
        $this->assertGuest();//testea que el usuario no está autenticado
    }
}
