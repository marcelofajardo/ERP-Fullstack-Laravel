<?php

namespace Database\Factories;

use App\Models\order_product;
use Illuminate\Database\Eloquent\Factories\Factory;

class order_productFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = order_product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => $this-> faker->randomNumber(2),
            'product_id' => $this->faker->randomNumber(2),
            'discount_id' => $this->faker->randomNumber(2),
            'quantity' => $this->faker->randomFloat(2, 25, 100),
            'taxes_id' => $this->faker->randomNumber(2),
        ];
    }
}          
