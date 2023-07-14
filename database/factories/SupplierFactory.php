<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->sentence(2),
            'name'  => $this->faker->name(),
            'address' => $this->faker->address(),
            'account_number'=> $this->faker->numerify('#############'),
            'account_owner'=> $this->faker->name(),
            'bank_name'=> $this->faker->sentence(1),
            'npwp'=> $this->faker->numerify('#############'),
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'state' => $this->faker->numberBetween(1,2),

        ];
    }
}
