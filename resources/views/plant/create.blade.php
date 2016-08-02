@extends('layout')


@section('content')
    <h1>品種追加</h1>
 
    <hr/>
 
    {!! Form::open(['url' => 'plant']) !!}
        <div class="form-group">
            {!! Form::label('name', '品種名:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('kana', 'ヨミガナ:') !!}
            {!! Form::text('kana', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('alias', '別名:') !!}
            {!! Form::text('alias', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('追加', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
@endsection