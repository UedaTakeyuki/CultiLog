@extends('layout4_plant_active')


@section('content')
    <h1>品種編集
        {!! link_to(action('PlantController@index'), '一覧', ['class' => 'btn btn-primary']) !!}
    </h1>
 
    <hr/>
 
    {!! Form::model($plant, ['method' => 'PATCH', 'url' => ['plant', $plant->id]]) !!}
        @include('plant.form', ['name' => $plant->name, 'kana' => $plant->kana, 'alias' => $plant->alias, 'submitButton_title' => '変更'])
    {!! Form::close() !!}
@endsection