<?php

namespace App\Services;

use App\Models\Ticket;

class TicketService
{
<<<<<<< HEAD
=======
    public function __construct(private SeatService $seatService)
    {}

>>>>>>> 7db126515c07c2ee793f8a44057817eb45127af5
    public function create(array $params): Ticket
    {
        $ticket = Ticket::create($params);

<<<<<<< HEAD
        (new SeatService())->create($params);
        return $ticket->whereId($ticket->id)->with('session')->with('seats')->first();
=======
        $this->seatService->create($params);
        return $ticket->whereId($ticket->id)->with(['session', 'seats'])->first();
>>>>>>> 7db126515c07c2ee793f8a44057817eb45127af5
    }
}
