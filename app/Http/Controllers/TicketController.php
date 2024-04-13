<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Events\TicketCreated;

class TicketController extends Controller
{
    /**
     * Display a listing of the ticket records.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Check if the user has the 'admin' role
        // if (auth()->user()->hasRole('admin')) {
            // dd('TICKETS');
        if (auth()->user()->hasAnyRole(['admin', 'su-admin'])) {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    // Check if the user has the 'user' role
    if (auth()->user()->hasRole('user')) {
        // Call the mytickets method internally
        return $this->mytickets();
    }

    }
    
    public function mytickets()
    {
        $tickets = Ticket::where('user_email', auth()->user()->email)->get();
        return view('tickets.mytickets', compact('tickets'));
    }

    /**
     * Display the ticket creation form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created ticket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_email' => 'required|email',
            // 'student_email' => 'required|email',
            'service_type' => 'required',
            'description' => 'required|string',
        ]);

        // Create the ticket in the database
        $ticket = new Ticket();
        $ticket->user_email = $request->input('user_email');
        // $ticket->student_email = $request->input('student_email');
        $ticket->service_type = $request->input('service_type');
        $ticket->description = $request->input('description');
        $ticket->ticket_status = 'Open'; // Set the default ticket status
        $ticket->save();

        // event(new TicketCreated($ticket)); // Trigger the event
        // Redirect back to the ticket creation form with a success message
        return redirect()->route('tickets.create')->with('success', 'Ticket created successfully!');
    }

    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        // dd($request);

        $request->validate([
            'user_email' => 'required|email',
            'student_email' => 'nullable|email',
            'service_type' => 'required|string',
            'description' => 'required|string',
            'ticket_status' => 'required|in:Open,In Progress,Closed',
            'conversation' => 'nullable|string',
            'solution' => 'nullable|string',
        ]);

        // $ticket->update($request->all());
        $ticket->update($request->all());
        $ticket->touch(); // Update the updated_at timestamp

        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully!');
    }
}
