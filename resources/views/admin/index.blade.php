@extends('layouts.default')

@section('header')

	@include('layouts.header')
	@include('layouts.tinymice')

@endsection


@section('content')

	<table class="table table-striped table-hover ">
		<thead>
		<tr>
			<th>Ticket number</th>
			<th>Title</th>
			<th>User Name</th>
			<th>Status</th>
			<th>Created at</th>
			<th>Edit</th>
			<th>Add Comments</th>
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
					<td><!-- Button trigger modal -->

						<a type="button" class="btn btn-primary"
						   {{--@if($ticket->status_id == 4)--}}
						        {{--disabled="true"--}}
						   {{--@else--}}
						        data-toggle="modal" data-target="#{{$ticket->id}}"
								{{--@endif--}}
						>
							Edit
						</a>
						<!-- Modal -->
						<div class="modal fade" id="{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">{{$ticket->issue_title}} Case</h4>
									</div>
									<div class="modal-body">
										<form method="post" action="/tickets/{{$ticket->id}}" class="form-horizontal">
											{{ csrf_field() }}
											<input type="hidden" name="_method" value="PUT">
											<fieldset>
												<div class="form-group">
													<label for="user_name" class="col-lg-2 control-label">User Name</label>
													<div class="col-lg-10">
														<input type="text" name="user_name" class="form-control" id="user_name" value="{{$ticket->user_name}}" readonly>
													</div>
												</div>

												<div class="form-group">
													<label for="title" class="col-lg-2 control-label">Issue Title</label>
													<div class="col-lg-10">
														<input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{$ticket->issue_title}}" readonly>
													</div>
												</div>

												<div class="form-group">
													<label for="error_type" class="col-lg-2 control-label">Error Types</label>
													<div class="col-lg-10">
														<select class="form-control" id="error_type" name="error_type" disabled="true">
															@if(count($error_types))
																@foreach($error_types as $error)
																	<option value="{{$error}}"
																	        @if($error == $ticket->error_type)
																	        selected="selected"
																			@endif
																	>{{$error}}</option>
																@endforeach
															@endif
														</select>
													</div>
												</div>

												<div class="form-group">
													<label for="operating_system" class="col-lg-2 control-label">Operating System</label>
													<div class="col-lg-10">
														<select class="form-control" id="operating_system" name="operating_system" disabled="true">
															@if(count($operating_systems))
																@foreach($operating_systems as $system)
																	<option value="{{$system}}"
																        @if($system == $ticket->operating_system)
																            selected="selected"
																		@endif
																	>{{$system}}</option>
																@endforeach
															@endif
														</select>
													</div>
												</div>
												<div class="form-group">
													<label for="page_url" class="col-lg-2 control-label">Page Url</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" name="page_url" id="page_url" value="{{$ticket->page_url}}" readonly>
													</div>
												</div>

												<div class="form-group">
													<label for="ticket_description" class="col-lg-2 control-label">Brief description of the problems</label>
													<div class="col-lg-10">
														<textarea class="form-control" name="ticket_description" rows="3" id="ticket_description" readonly>{{$ticket->description}}</textarea>
													</div>
												</div>

												<div class="form-group">
													<label for="ticket_comment" class="col-lg-2 control-label">Comment from Admin</label>
													<div class="col-lg-10">
														<ul class="list-group" name="ticket_comment" rows="3" id="ticket_comment" readonly>
															@foreach($ticket->comments as $comment)
																<li class="list-group-item">{!! $comment->content !!}</li>
															@endforeach
														</ul>
													</div>
												</div>

												<div class="form-group">
													<label for="status_id" class="col-lg-2 control-label">Current Status</label>
													<div class="col-lg-10">
														<select class="form-control" id="status_id" name="status_id">
															@foreach($statuses as $status)

																<option @if($ticket->status_id == $status->id)
																        selected="selected"@endif
																		value="{{$status->id}}"
																>{{$status->name}}</option>

															@endforeach
														</select>
													</div>
												</div>
											</fieldset>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<input type="submit" class="btn btn-primary" name="update" value="Save Changes">
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>
					</td>
					<td><a type="button" class="btn btn-primary"
					       @if($ticket->status_id == 4)
					       disabled="true"
					       @else
					       data-toggle="modal" data-target="#CommentModal"
								@endif
						>
							Add
						</a>
						<!-- Modal -->
						<div class="modal fade" id="CommentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">{{$ticket->issue_title}} Case</h4>
									</div>
									<div class="modal-body">
										<form method="post" action="/comments" class="form-horizontal">
											{{ csrf_field() }}
											<fieldset>
												<input type="hidden" value="{{$ticket->id}}" name="ticket_id">
												<div class="form-group">
													<label for="ticket_comment" class="col-lg-2 control-label">Ticket's Comments</label>
													<div class="col-lg-10">
														<textarea class="form-control" name="ticket_comment" rows="3" id="ticket_comment"></textarea>
													</div>
												</div>
											</fieldset>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<input type="submit" class="btn btn-primary" name="add_comment" value="Add Comment">
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>
					</td>
				{{--@endif--}}
				</tr>
			@endforeach
		@endif
		</tbody>
	</table>

@endsection

@section('footer')

	@include('layouts.footer')

	@endsection