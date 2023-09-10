<?php

namespace App\Services;

use App\Repositories\TicketRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class TicketService
{
    protected TicketRepository $ticketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function index(): LengthAwarePaginator
    {
        return $this->ticketRepository->index();
    }

    public function getIndexByStatus(string $status): LengthAwarePaginator
    {
        return $this->ticketRepository->getIndexByStatus($status);
    }

    public function store(array $ticket)
    {
        return $this->ticketRepository->store($ticket);
    }
}
