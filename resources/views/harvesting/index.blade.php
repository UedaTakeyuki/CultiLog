@extends('layout')
 
@section('content')
    <h1>Harvestings</h1>
 
    <hr/>
    <table class="table table-striped"> 
    @foreach($harvestings as $harvesting)
    <tr>
        <td>{{$harvesting->harvested_at}}</td>
        <td>{{$harvesting->planting->shelf->name}}</td>
        <td>{{$harvesting->planting->plant->name}}</td>
        <td>{{$harvesting->duration()}}</td>
        <td>{{$harvesting->weight}}</td>
        <td><a href="/harvesting/show/{{$harvesting->id}}" class="btn btn-primary btn-sm">詳細</a></td>
        <td><a href="/harvesting/edit/{{$harvesting->id}}" class="btn btn-primary btn-sm">編集</a></td>
        <td>
            <form method="post" action="/harvesting/{{$harvesting->id}}">
                <input name="_method" type="hidden" value="delete">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" value="削除" class="btn btn-danger btn-sm btn-destroy">
            </form>
        </td>
    </tr>
    @endforeach
    </table>
@endsection