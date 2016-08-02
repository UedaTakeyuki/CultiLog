@extends('layout3')
 
@section('content')
    <h1>Plantings</h1>
    <a href="/planting/create" class="btn btn-primary btn-sm">追加</a>
 
    <hr/>
    
    <table class="table table-striped"> 
    @foreach($plantings as $planting)
    <tr>
        <td>{{$planting->planted_at}}</td>
        <td>{{$planting->shelf->name}}</td>
        <td>{{$planting->plant->name}}</td>
        <td><a href="/planting/{{$planting->id}}" class="btn btn-primary btn-sm">詳細</a></td>
        <td><a href="/planting/edit/{{$planting->id}}" class="btn btn-primary btn-sm">編集</a></td>
        <td>
            <form method="post" action="/planting/{{$planting->id}}">
                <input name="_method" type="hidden" value="delete">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" value="削除" class="btn btn-danger btn-sm btn-destroy">
            </form>
        </td>
    </tr>
    @endforeach
    </table>
@endsection