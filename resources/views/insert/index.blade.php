@extends('layouts.app')
@section('content')
    {!! Form::open(['route' => 'insert.store', 'method' =>'POST']) !!}
        {{ Form::submit('submit') }}
    {!! Form::close() !!}
@endsection