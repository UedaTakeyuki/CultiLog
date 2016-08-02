@extends('layout')

@section('content')
    <h1>Shelf</h1>

    <h2>{{$shelf->name}}</h2>
    <a href="{{ secure_url('/planting/create/'. $shelf->id)}}" class="btn btn-primary btn-sm">追加</a>
    <hr/>
    
    <table class="table table-striped"> 
    @foreach($shelf->plantings as $planting)
    <tr>
      <td>
        <a href="{{ url('planting', $planting->id) }}" data-ajax="false" >
          {{$planting->plant->name}}
        </a>
        <span class="badge">{{$planting->duration()}}</span>
      </td>
<!--      <td><a href="/planting/show/{{$planting}}" class="btn btn-primary btn-sm">詳細</a></td>
      <td><a href="/planting/edit/{{$planting}}" class="btn btn-primary btn-sm">編集</a></td>-->
      <td>
        <form method="post" action="/planting/{{$planting}}">
          <input name="_method" type="hidden" value="delete">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="submit" value="終了" class="btn btn-danger btn-sm btn-destroy">
        </form>
      </td>
    </tr>
    @endforeach
    </table>

@endsection