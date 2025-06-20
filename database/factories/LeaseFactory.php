<?php

namespace Database\Factories;

use App\Models\Lease;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaseFactory extends Factory
{
    protected $model = Lease::class;

    public function definition(): array
    {
        return [
            'property_id' => Property::factory(),
            'landlord_id' => User::factory(),
            'tenant_id'   => User::factory(),
            'start_date'  => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'end_date'    => $this->faker->dateTimeBetween('+1 month', '+1 year'),
            'rent'        => $this->faker->randomFloat(2, 800, 5000),
            'status'      => 'draft',
        ];
    }
}
