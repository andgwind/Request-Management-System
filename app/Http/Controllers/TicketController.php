<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexTicketRequest;
use App\Http\Resources\TicketCollection;
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

        if (isset($status))
        {
            $tickets = $this->ticketService->getIndexByStatus($status);

        } else {
            $tickets = $this->ticketService->index();
        }

        return new TicketCollection($tickets);
    }
}
