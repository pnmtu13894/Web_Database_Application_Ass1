@extends('layouts.default')
@include('layouts.header')

@section('content')

<div class="container">
	<h2 class="text-info">Topic: Frequently Asked Questions</h2>
	@if(count($tickets) > 0)
		@foreach($tickets as $ticket)
			<blockquote>
				<p>Question: "{{$ticket->issue_title}}"</p>
				<small><cite title="Source Title">User: </cite>"{!! $ticket->description !!}"</small>
				<small><cite title="Source Title">Admin: </cite>@foreach($ticket->comments as $comment){!! $comment->content !!}@endforeach</small>
			</blockquote>

		@endforeach
	@endif
</div>
@endsection

@section('footer')

	@include('layouts.footer')

@endsection