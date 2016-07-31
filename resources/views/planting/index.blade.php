@extends('layout')
 
@section('content')
    <h1>Plantings</h1>
 
    <hr/>
     
    @foreach($plantings as $planting)
        <article>
            <h2>
                <a href="{{ url('planting', $planting->id) }}">
                    {{ $planting->planted_at }}
                </a>
            </h2>
        </article>
    @endforeach
@endsection