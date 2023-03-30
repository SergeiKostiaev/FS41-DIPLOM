<?php

namespace App\Services;

use App\Models\Seat;
use App\Models\Ticket;

class SeatService
{
    public function create(array $params): Seat
    {

        foreach ($params['seats'] as $seatId) {
            $seat = Seat::findOrFail($seatId);
            $ticket = Ticket::create($params)->seats()->save($seat);
        }
        return $ticket;
    }
}
