@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Attendees</div>
                <div class="card-body">
                    <table class="table" id="attendees">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th class="text-right">Verified At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendees as $attendee)
                            <tr>
                                <td>{{ $attendee->name }}</td>
                                <td>{{ $attendee->email }}</td>
                                <td>{{ $attendee->phone }}</td>
                                <td class="text-right">
                                    @if ( isset($attendee->verified_at) )
                                        {{ $attendee->verified_at }}
                                    @else
                                        <a href="/attendees/{{ $attendee->id }}/verify">Verify</a>
                                    @endif
                                </td>
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

@section('scripts')
<script type="text/javascript">
    $(document).ready( function () {
        $('#attendees').DataTable({
            "pageLength": 25
        });
    } );
</script>
@endsection