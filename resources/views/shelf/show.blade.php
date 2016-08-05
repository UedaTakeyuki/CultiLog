@extends('layout4_unit_active')

@section('content')
    <h1>棚</h1>

    <h2>{{$shelf->name}}</h2>
    <a href="{{ secure_url('/planting/create/'. $shelf->id)}}" class="btn btn-primary btn-sm">追加</a>
    <hr/>
    
    <table class="table table-striped"> 
    @foreach($shelf->plantings as $planting)
    <tr>
      <td>
        <a href="{{ url('planting', $planting->id) }}" data-ajax="false" >
          @if(($planting->closed_at)==0)
            {{$planting->plant->name}}
          @else
            <span class="text-muted">{{$planting->plant->name}}</span>
          @endif
        </a>
        <span class="badge">{{$planting->duration()}}</span>
      </td>
<!--      <td><a href="/planting/show/{{$planting}}" class="btn btn-primary btn-sm">詳細</a></td>
      <td><a href="/planting/edit/{{$planting}}" class="btn btn-primary btn-sm">編集</a></td>-->
      <td>
        @if(($planting->closed_at)==0)
          <form method="post" action="/planting/close/{{$planting->id}}">
            <input name="_method" type="hidden" value="delete">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" value="CLOSE" class="btn btn-danger btn-sm btn-destroy">
          </form>
        @else
          <input type="submit" value="Closed at {{$planting->closed_at}}" class="btn btn-sm btn-destroy" disabled="disabled">
        @endif
      </td>
    </tr>
    @endforeach
    </table>

@endsection