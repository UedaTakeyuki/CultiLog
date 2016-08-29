@extends('layout4_unit_active')

@section('header_after')
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
 
  // ライブラリのロード
  // name:visualization(可視化),version:バージョン(1),packages:パッケージ(corechart)
  google.load('visualization', '1', {'packages':['corechart']});     
         
  // グラフを描画する為のコールバック関数を指定
  google.setOnLoadCallback(drawChart);
 
  // グラフの描画   
  function drawChart() {         
 
    // 配列からデータの生成
    var data = google.visualization.arrayToDataTable([
      ['日数', '重さ'],
      @foreach($planting->harvestings as $harvesting)
      [ {{$harvesting->duration()}} , {{$harvesting->weight}} ],
      @endforeach
    ]);
 
    // オプションの設定
    var options = {
      title: '収穫散布',
      hAxis: {title: '栽培日数'},   // 水平の説明,
      vAxis: {title: '重さ(グラム)'},   // 垂直の説明
      legend: 'none'                  // 凡例なし    
     };
                 
    @if (count($planting->harvestings) != 0)
      // 指定されたIDの要素に散布図を作成
      var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));
      // グラフの描画
      chart.draw(data, options);
    @endif
  }
</script>
@endsection

@section('content')
    <h1>
      {{$planting->plant->name}}の定植
      {!! link_to(action('PlantingController@edit', ['id' => $planting->id]), '編集', ['class' => 'btn btn-primary']) !!}
    </h1>

    <!--<h2>{{$planting->plant->name}}</h2>-->
    <h3>
      場所：棚{{$planting->shelf->name}}<br>
      定植日：{{$planting->planted_at}}
      <form method="post" action="/planting/close/{{$planting->id}}">
        <input name="_method" type="hidden" value="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" value="撤収処理" class="btn btn-danger btn-sm btn-warning">
      </form>

      <br>
      @if(($planting->closed_at)!=0)
        撤収日：{{$planting->closed_at}}
        {!! Form::model($planting, ['method' => 'post', 'url' => ['planting/reopen', $planting->id]]) !!}
          {!! Form::submit('再開', ['class' => 'btn btn-sm btn-primary']) !!}
        {!! Form::close() !!}

        <br>
      @endif
    </h3>
    <hr/>
    
    <h3>収穫一覧
      {!! link_to(action('HarvestingController@create', ['planting_id' => $planting->id]), '追加', ['class' => 'btn btn-primary']) !!}
    </h3>
    <!--  グラフの描画エリア -->
    <div id="chart_div" style="width: 100%; height: 350px"></div>
 

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