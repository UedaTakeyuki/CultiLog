@extends('layout')
 
@section('content')
    <h1>Harvestings</h1>
 
    <hr/>
     
    @foreach($harvestings as $harvesting)
        <article>
            <h2>
                <a href="{{ url('plant', $plant->id) }}">
                    {{ $plant->name }}
                </a>
            </h2>
        </article>
    @endforeach
@endsection