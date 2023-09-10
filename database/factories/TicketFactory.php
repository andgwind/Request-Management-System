<?php

namespace Database\Factories;

use App\Enums\TicketStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $shouldGenerateComment = rand(0, 1);

        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'status' => TicketStatus::randomValue(),
            'message' => fake()->text(200),
            'comment' => $shouldGenerateComment ? fake()->text(200) : null,
        ];
    }
}
