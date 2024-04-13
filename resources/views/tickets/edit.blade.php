<!-- resources/views/tickets/edit.blade.php -->

@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Ticket</div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('tickets.update', $ticket) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="user_email">User Email</label>
                            <input type="email" name="user_email" id="user_email" class="form-control" value="{{ $ticket->user_email }}" required readonly>
                        </div>

                        <!-- For Future use -->
                        <!-- <div class="form-group">
                            <label for="student_email">Student Email</label>
                            <input type="email" name="student_email" id="student_email" class="form-control" value="{{ $ticket->student_email }}" required>
                        </div> -->

                        <div class="form-group">
                            <label for="service_type">Service Type</label>
                            <input type="text" name="service_type" id="service_type" class="form-control" value="{{ $ticket->service_type }}" required readonly>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" required>{{ $ticket->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="ticket_status">Ticket Status</label>
                            <select name="ticket_status" id="ticket_status" class="form-control" required>
                                <option value="Open" {{ $ticket->ticket_status === 'Open' ? 'selected' : '' }}>Open</option>
                                <option value="In Progress" {{ $ticket->ticket_status === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="Closed" {{ $ticket->ticket_status === 'Closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="conversation">Conversation</label>
                            <textarea name="conversation" id="conversation" class="form-control">{{ $ticket->conversation }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="solution">Solution</label>
                            <textarea name="solution" id="solution" class="form-control">{{ $ticket->solution }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Ticket</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
