<?php

namespace Tests\Feature;




use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_()
    {

              $user = [
                  'name' => 'John Smith',
                  'email' => 'john.smith@email.com',
                  'password' => 'password',
                  'type'  =>'client',
                  'address'=>'Calle Mayor,67',
                  'cif_nif'=>'45678902S',
                  'image'=>'https://icon-icons.com/es/icono/avatar-hombre-retrato/113269'
              ];

              $response = $this->post('/register', $user);
              $this->withoutMiddleware();
              $response->assertRedirect('/home');


    }
}
