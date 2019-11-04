@extends('layouts.app')
@section('content')
    <div class="container">
        {!! Form::open(['route' => 'room.getRoomDetails', 'method' => 'POST', 'target' => '_blank']) !!}
            <div class="form-group">
                {{ Form::label('rooms','Select a Room', ['class' => 'form-label']) }}
                {{ Form::select('rooms', $rooms, old('rooms'), ['class' => 'form-control']) }}
            </div>
                {{ Form::submit('Submit', ['class' => 'btn btn-info rounded-0 border border-dark text-dark form-control']) }}
        {!! Form::close() !!}
    </div>
@endsection
