<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexTicketRequest;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\TicketCollection;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use App\Services\TicketService;

class TicketController extends Controller
{
    protected TicketService $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function index(IndexTicketRequest $request): TicketCollection
    {
        $status = $request->input('status');

        if (isset($status)) {
            $tickets = $this->ticketService->getIndexByStatus($status);

        } else {
            $tickets = $this->ticketService->index();
        }

        return new TicketCollection($tickets);
    }

    public function store(StoreTicketRequest $request): TicketResource
    {
        $ticket = $request->all();
        $ticket = $this->ticketService->store($ticket);

        return new TicketResource($ticket);
    }

    public function update(UpdateTicketRequest $request, Ticket $ticket): TicketResource
    {
        $comment = $request->input('comment');
        $updatedTicket = $this->ticketService->update($comment, $ticket);

        return new TicketResource($updatedTicket);
    }
}
