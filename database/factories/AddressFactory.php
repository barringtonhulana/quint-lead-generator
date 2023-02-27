<?php

namespace Database\Factories;

use App\Models\Career;
use Faker\Provider\en_ZA\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $career = Career::factory()->create();
        return [
            'career_id' => $career->id,
            'country' => $this->faker->country(),
            'street_address' => $this->faker->streetAddress(),
            'city' => Address::cityPrefix() . ' ' . $this->faker->city(),
            'region' => Address::province(),
            'postal_code' => $this->faker->postcode(),
        ];
    }
}
