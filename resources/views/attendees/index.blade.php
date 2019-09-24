@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Attendees</div>

                <div class="card-body">
                    @foreach ($attendees as $attendee)
						<p>{{ $attendee->name }}</p>
					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection