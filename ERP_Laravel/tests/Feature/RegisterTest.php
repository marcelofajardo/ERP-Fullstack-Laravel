<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function register_test()
    {
        $name = $this->faker->name();
        $email = $this->faker->unique()->safeEmail();
        $password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $address =$this->faker->address();
        $cif_nif = $this->faker->randomNumber(9);
        $image =$this->faker->imageUrl();


    }
}
