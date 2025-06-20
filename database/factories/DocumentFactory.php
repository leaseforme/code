<?php

namespace Database\Factories;

use App\Models\Document;
use App\Models\Lease;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    protected $model = Document::class;

    public function definition(): array
    {
        return [
            'lease_id'  => Lease::factory(),
            'name'      => $this->faker->word() . '.pdf',
            'path'      => 'documents/' . $this->faker->uuid . '.pdf',
            'mime_type' => 'application/pdf',
            'size'      => $this->faker->numberBetween(10000, 500000),
        ];
    }
}
