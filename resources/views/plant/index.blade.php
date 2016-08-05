@extends('layout4_plant_active')
 
@section('content')
    <h1>品種一覧<!-- </h1> -->
    <a href="/plant/create" class="btn btn-primary btn-sm">追加</a></h1>
<!--    <a href="/unit" class="btn btn-primary btn-sm">栽培棚管理</a> -->


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