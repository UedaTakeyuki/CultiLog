@extends('layout4_plant_active')


@section('content')
    <h1>品種追加
        {!! link_to(action('PlantController@index'), '一覧', ['class' => 'btn btn-primary']) !!}
    </h1>
 
    <hr/>
 
    {!! Form::open(['url' => 'plant']) !!}
        @include('plant.form', ['name' => null, 'kana' => null, 'alias' => null, 'submitButton_title' => '変更'])
    {!! Form::close() !!}
@endsection