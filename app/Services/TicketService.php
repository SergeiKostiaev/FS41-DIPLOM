<?php

namespace App\Services;

use App\Models\Ticket;

class TicketService
{
    public function __construct(private SeatService $seatService)
    {}

    public function create(array $params): Ticket
    {
        $ticket = Ticket::create($params);

        $this->seatService->create($params);
        return $ticket->whereId($ticket->id)->with(['session', 'seats'])->first();
    }
}
