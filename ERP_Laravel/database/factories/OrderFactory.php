<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $total = $this->faker->randomNumber(2, 25, 100);   
        
        return [
            'user_id'=> $this->faker->randomNumber(2),
            'taxes_id' => $this->faker->randomNumber(2),
            'discount_id' => $this->faker->randomNumber(2),
            'payment_id' => $this->faker->randomNumber(2),
            'adress_id' => $this->faker->randomNumber(2),
            'date' => today(),
            'gross_total' => $total,
            'net_total' => $total,
            'comments'   => $this->faker->text(), 
            
        ];
    }
}

   
