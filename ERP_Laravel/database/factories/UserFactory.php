<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('es_ES');
        return [
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'address' => $faker->address(),
            'cif_nif' => $faker->vat(),
            'email_verified_at' => now(),
            'image' => 'images/profile_picture.jpg',
            //'image'=>$faker->imageUrl(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'remember_token' => Str::random(10),
            'dni' => $faker->dni(),
            'phone' => $faker->randomNumber(9),
            'salary' => $faker->numberBetween($min = 18000, $max = 100000, $step = 1000),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function client()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'client',
            ];
        });
    }


    public function employee()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'employee',
            ];
        });
    }
}
