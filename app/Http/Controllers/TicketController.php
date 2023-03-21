<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Seat;
use App\Models\Ticket;
use Illuminate\Http\Response;

class TicketController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request)
    {
        $ticket = Ticket::create($request->validated());
        foreach ($request->validated()['seats'] as $seatId) {
            $seat = Seat::findOrFail($seatId);
            $ticket->seats()->save($seat);
        }
        return response($ticket->whereId($ticket->id)->with('session')->with('seats')->first(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Ticket::whereId($id)->with('session')->with('seats')->first();
    }
}
