@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Attendees</div>
                <div class="card-body">
					<form method="POST" action="/attendees/{{ $attendee->id }}" class="card" enctype="multipart/form-data">
						@method('PATCH')
						@csrf

                		<input type="text" name="verification_code">
                		<button type="submit" name="submit">Verify</button>

                	</form>
					@foreach($errors->all() as $error)
						<div class="alert alert-danger" role="alert">
						 	{{ $error }}
						</div>
					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection