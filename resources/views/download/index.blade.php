@extends('layout4_download_active')
 
@section('content')
    <h1>ダウンロード</h1>
    <hr/>
    {!! link_to_route('download.plants.excel', 
        '品種一覧', null, 
        ['class' => 'btn btn-info']) 
    !!}
    {!! link_to_route('download.plantings.excel', 
        '定植一覧', null, 
        ['class' => 'btn btn-info']) 
    !!}
    {!! link_to_route('download.harvestings.excel', 
        '収穫一覧', null, 
        ['class' => 'btn btn-info']) 
    !!}
@endsection