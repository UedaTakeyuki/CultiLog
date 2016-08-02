@extends('layout')
 
@section('content')
    <h1>Planting</h1>
    <h2>{{$planting->plant->name}}<br>
    {{$planting->planted_at}}<br></h2>
    <a href="/harvesting/create/{{$planting->id}}" class="btn btn-primary btn-sm">収穫</a>
 
    <hr/>

    <table class="table table-striped"> 
    @foreach($planting->harvestings as $harvesting)
    <tr>
        <td>{{$harvesting->harvested_at}}</td>
        <td>{{$harvesting->weight}}</td>
        <td><a href="/harvesting/show/{{$harvesting}}" class="btn btn-primary btn-sm">詳細</a></td>
        <td><a href="/harvesting/edit/{{$harvesting}}" class="btn btn-primary btn-sm">編集</a></td>
        <td>
            <form method="post" action="/harvesting/{{$harvesting}}">
                <input name="_method" type="hidden" value="delete">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" value="削除" class="btn btn-danger btn-sm btn-destroy">
            </form>
        </td>
    </tr>
    @endforeach
    </table>
@endsection