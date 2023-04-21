<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Services\TicketService;
use App\Models\Ticket;
use Illuminate\Http\Response;

class TicketController extends Controller
{
<<<<<<< HEAD
=======
    public function __construct(private TicketService $ticketService)
    {
    }
>>>>>>> 7db126515c07c2ee793f8a44057817eb45127af5

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketRequest $request): Response
    {
        $params = $request->validated();
<<<<<<< HEAD
        $ticket = (new TicketService())->create($params);
=======
        $ticket = $this->ticketService->create($params);
>>>>>>> 7db126515c07c2ee793f8a44057817eb45127af5
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
<<<<<<< HEAD
        return Ticket::whereId($id)->with('session')->with('seats')->first();
=======
        return Ticket::whereId($id)->with(['session', 'seats'])->first();
>>>>>>> 7db126515c07c2ee793f8a44057817eb45127af5
    }
}
