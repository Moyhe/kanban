<?php

namespace Database\Factories;

use App\Models\Memeber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MemberFactory extends Factory
{
    protected $model = Memeber::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'title' => fake()->title(),
            'age' => fake()->numberBetween(20, 40),
            'email' => fake()->unique()->safeEmail(),
            'mobile_number' => '1234567'
        ];
    }
}
