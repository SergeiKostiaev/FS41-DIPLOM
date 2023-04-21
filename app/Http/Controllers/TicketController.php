<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Services\TicketService;
use App\Models\Ticket;
use Illuminate\Http\Response;

class TicketController extends Controller
{
    public function __construct(private TicketService $ticketService)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request): Response
    {
        $params = $request->validated();
        $ticket = $this->ticketService->create($params);
        return response($ticket, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Ticket::whereId($id)->with(['session', 'seats'])->first();
    }
}
