<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    public function definition(): array
    {
        return [
            'user_id'    => User::factory(),
            'title'      => $this->faker->sentence(3),
            'description'=> $this->faker->paragraph(),
            'address'    => $this->faker->streetAddress(),
            'city'       => $this->faker->city(),
            'state'      => $this->faker->stateAbbr(),
            'zip'        => $this->faker->postcode(),
            'rent'       => $this->faker->randomFloat(2, 800, 5000),
            'bedrooms'   => $this->faker->numberBetween(1, 5),
            'bathrooms'  => $this->faker->numberBetween(1, 3),
            'sqft'       => $this->faker->numberBetween(500, 4000),
        ];
    }
}
