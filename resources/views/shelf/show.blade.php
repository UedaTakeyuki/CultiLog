@extends('layout4_unit_active')

@section('content')
    <h1>棚 {{$shelf->name}}</h1>
    <hr/>

    <h2>定植一覧
      <a href="{{ secure_url('/planting/create/'. $shelf->id)}}" class="btn btn-primary btn-sm">追加</a>
    </h2>
    
    <table class="table table-striped"> 
    @foreach($shelf->plantings as $planting)
    <tr>
      <td>
        <a href="{{ url('planting', $planting->id) }}" data-ajax="false" >
            {{$planting->plant->name}}
        </a>
        @if(($planting->closed_at)==0)
          <span class="badge">{{$planting->duration()}}</span>
        @else
          <span class="badge">{{$planting->closed_at}} Closed</span>
        @endif
      </td>
<!--      <td><a href="/planting/show/{{$planting}}" class="btn btn-primary btn-sm">詳細</a></td>
      <td><a href="/planting/edit/{{$planting}}" class="btn btn-primary btn-sm">編集</a></td>-->
      <td>
        @if(($planting->closed_at)==0)
          <form method="post" action="/planting/close/{{$planting->id}}">
            <input name="_method" type="hidden" value="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" value="撤収処理" class="btn btn-danger btn-sm btn-warning">
          </form>
        @else
          <!-- <input type="submit" value="Closed at {{$planting->closed_at}}" class="btn btn-sm btn-destroy btn-inline" disabled="disabled">-->
          {!! Form::model($planting, ['method' => 'post', 'url' => ['planting/reopen', $planting->id]]) !!}
            <!-- <div class="form-group"> -->
              {!! Form::submit('再開', ['class' => 'btn btn-sm btn-primary']) !!}
            <!-- </div> -->
          {!! Form::close() !!}
        @endif
      </td>
    </tr>
    @endforeach
    </table>

@endsection