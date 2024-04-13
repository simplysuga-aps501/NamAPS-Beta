<!-- resources/views/tickets/index.blade.php -->

@extends('layouts.main')

@section('content')
<div class="content">

<div class="breadcrumb-wrapper">
	<!-- <h1>Tables</h1> -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb p-0">
            <!-- <li class="breadcrumb-item">
              <a href="index.html">
                <span class="mdi mdi-home"></span>                
              </a>
            </li> -->
            @role('admin')
            <li class="breadcrumb-item">
                <a href="/tickets">All Tickets</a> 
            </li>
            @endrole
            <li class="breadcrumb-item">
                <a href="/tickets/mytickets">My Tickets</a> 
            </li>            
            <li class="breadcrumb-item" aria-current="page">
                <a href="/tickets/create">Create ticket</a>
            </li>
          </ol>
        </nav>

</div>

<div class="row">
	<div class="col-12">
		<div class="card card-default">
			<div class="card-header card-header-border-bottom d-flex justify-content-between">
				<h2>My Service Tickets </h2>

				<!-- <a href="https://datatables.net/extensions/rowreorder/examples/initialisation/responsive.html" target="_blank" class="btn btn-outline-primary btn-sm text-uppercase">
					<i class=" mdi mdi-link mr-1"></i> Docs
				</a> -->
                <a href="/tickets/create">New Ticket</a>
			</div>

			<div class="card-body">
				<div class="responsive-data-table">
					<table id="responsive-data-table" class="table dt-responsive nowrap" style="width:100%">
						<thead>
                            <tr>
                                <th>ID</th>
                                <th>User Email</th>
                                <th>Student Email</th>
                                <th>Service Type</th>
                                <th>Description</th>
                                <th>Conversation</th>
                                <th>Solution</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
						</thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->user_email }}</td>
                                <td>{{ $ticket->student_email }}</td>
                                <td>{{ $ticket->service_type }}</td>
                                <td>{{ $ticket->description }}</td>
                                <td>{{ $ticket->conversation }}</td>
                                <td>{{ $ticket->solution }}</td>
                                <td>{{ $ticket->ticket_status }}</td>
                                <td><a href="/tickets/{{ $ticket->id }}/edit">Update Ticket</a></td>
                                <td>{{ $ticket->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $ticket->updated_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

      </div> 
@endsection
