@extends('layouts.default')

@section('header')

	@include('layouts.header')
	@include('layouts.tinymice')

@endsection
@section('content')

	@if(count($errors) > 0)
	<div class="panel panel-warning">
		<div class="panel-heading">
			<h3 class="panel-title">Errors Warning</h3>
		</div>
		<div class="panel-body">
			<ul>
				@foreach($errors->all() as $error)

					<li>{{$error}}</li>

				@endforeach
			</ul>
		</div>
	</div>
	@endif

	<div class="container">
	{{--{!! Form::open(['method'=>'POST', 'action'=>'TicketsController@store']) !!}--}}
	{{--{!! Form::close() !!}--}}
		<form method="post" action="/tickets" class="form-horizontal">
			{{ csrf_field() }}
			<fieldset>
				<legend>Ticket Submission System</legend>
				<div class="form-group">
					<label for="first_name" class="col-lg-2 control-label">First Name *</label>
					<div class="col-lg-10">
						<input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
					</div>
				</div>
				<div class="form-group">
					<label for="last_name" class="col-lg-2 control-label">Last Name *</label>
					<div class="col-lg-10">
						<input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-lg-2 control-label">Email *</label>
					<div class="col-lg-10">
						<input type="text" name="email" class="form-control" id="email" placeholder="Email">
					</div>
				</div>

				<div class="form-group">
					<label for="title" class="col-lg-2 control-label">Issue Title *</label>
					<div class="col-lg-10">
						<input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				</div>

				<div class="form-group">
					<label for="error_type" class="col-lg-2 control-label">Error Types *</label>
					<div class="col-lg-10">
						<select class="form-control" id="error_type" name="error_type">
							@if(count($error_types))
								@foreach($error_types as $error)
									<option value="{{$error}}">{{$error}}</option>
								@endforeach
							@endif
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="operating_system" class="col-lg-2 control-label">Operating System *</label>
					<div class="col-lg-10">
						<select class="form-control" id="operating_system" name="operating_system">
							@if(count($operating_systems))
								@foreach($operating_systems as $system)
									<option value="{{$system}}">{{$system}}</option>
								@endforeach
							@endif
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="page_url" class="col-lg-2 control-label">Page Url</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="page_url" id="page_url" placeholder="Page Url">
						<span class="help-block">Let us know what page you found a problem on.</span>
					</div>
				</div>

				<div class="form-group">
					<label for="ticket_description" class="col-lg-2 control-label">Brief description of the problems</label>
					<div class="col-lg-10">
						<textarea class="form-control" name="ticket_description" rows="3" id="ticket_description"></textarea>
						<span class="help-block">Please describe your problems here</span>
					</div>
				</div>

				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						{{--<button type="reset" class="btn btn-default">Cancel</button>--}}
						<input type="submit" class="btn btn-primary" name="report" value="Report Error">
					</div>
				</div>

			</fieldset>
		</form>
	</div>

	<div class="container">
		<table class="table table-striped table-hover ">
			<caption>List of Questions by Users</caption>
			<thead>
			<tr>
				<th>Ticket number</th>
				<th>Title</th>
				<th>User Name</th>
				<th>Status</th>
				<th>Created at</th>
			</tr>
			</thead>
			<tbody>
			@if(count($tickets) > 0)

				@foreach($tickets as $ticket)
					<tr>
						{{--				@if($ticket->status_id == 1)--}}
						<td>{{ $ticket->id  }}</td>
						<td>{{$ticket->issue_title}}</td>
						<td>{{$ticket->user_name}}</td>
						<td><span
									class="
						        @if($ticket->status_id == 1)
																		label label-primary
								@elseif($ticket->status_id == 2)
																		label label-success
								@elseif($ticket->status_id == 3)
																		label label-warning
								@elseif($ticket->status_id == 4)
																		label label-danger
								@endif
											">
								{{$ticket->status->name}}</span></td>
						<td>{{$ticket->created_at->diffForhumans()}}</td>
						{{--@endif--}}
					</tr>
				@endforeach
			@endif
			</tbody>
		</table>
	</div>

@endsection

@section('footer')

	@include('layouts.footer')

@endsection