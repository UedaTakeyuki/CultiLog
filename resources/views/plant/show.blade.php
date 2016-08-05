@extends('layout4_plant_active')
 
@section('content')
{{ $plant->kana }}
    <h1>{{ $plant->name }}</h1>
 
    <hr/>
 
    <h3>別名：{{ $plant->alias }}</h3>

    <iframe src="http://images.search.biglobe.ne.jp/cgi-bin/search?q={{$plant->name}}" height="600" width="100%" frameborder="0" allowfullscreen></iframe>
@endsection