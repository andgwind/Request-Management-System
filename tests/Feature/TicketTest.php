<?php

namespace Tests\Feature;

use App\Enums\TicketStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_store_ticket_by_user(): void
    {
        $ticketData = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'status' => TicketStatus::ACTIVE->value,
            'message' => 'This is a sample ticket message',
            'comment' => 'This is a sample comment',
        ];

        $response = $this->postJson('/api/v1/tickets', $ticketData);

        $response->assertStatus(201);

        $this->assertDatabaseCount('tickets', 1);
    }
}
