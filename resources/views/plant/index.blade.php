@extends('layout')
 
@section('content')
    <h1>Plants</h1>
 
    <hr/>
     
    @foreach($plants as $plant)
        <article>
            <h2>
                <a href="{{ url('plant', $plant->id) }}">
                    {{ $plant->name }}
                </a>
            </h2>
        </article>
    @endforeach
@endsection