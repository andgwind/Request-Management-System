<?php

namespace App\Repositories;

use App\Enums\TicketStatus;
use App\Models\Ticket;
use Illuminate\Pagination\LengthAwarePaginator;

class TicketRepository
{
    public function index(): LengthAwarePaginator
    {
        return Ticket::paginate();
    }

    public function getIndexByStatus(string $status): LengthAwarePaginator
    {
        return Ticket::where('status', $status)
            ->orderByDesc('created_at')
            ->paginate();
    }

    public function store(array $ticket)
    {
        return Ticket::create($ticket);
    }

    public function update(string $comment, Ticket $ticket): ?Ticket
    {
        $ticket->update([
            'status' => TicketStatus::ACTIVE,
            'comment' => $comment,
        ]);

        return $ticket->fresh();
    }
}
