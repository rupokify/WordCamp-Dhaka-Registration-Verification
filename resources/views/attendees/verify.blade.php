@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Attendees</div>
                <div class="card-body">
					<form method="POST" action="/attendees/{{ $attendee->id }}" enctype="multipart/form-data">
						@method('PATCH')
						@csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Verification Code</label>
                            <input type="number" class="form-control" name="verification_code">
                        </div>
                		<button type="submit" class="btn btn-primary">Verify</button>
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