<?php

namespace Database\Factories;

use App\Models\Ms_customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Ms_customerFactory extends Factory
{

    protected $model = Ms_customer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'alamat' => fake()->address(),
            'phone' => fake()->phoneNumber(),
        ];
    }
}
