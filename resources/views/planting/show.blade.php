@extends('layout3')

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
                 
    // 指定されたIDの要素に散布図を作成
    var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));
      
    // グラフの描画
    chart.draw(data, options);
  }
</script>
@endsection

@section('content')
    <h1>Planting</h1>

    <h2>{{$planting->plant->name}}<br>
    {{$planting->planted_at}}<br></h2>

    <a href="/harvesting/create/{{$planting->id}}" class="btn btn-primary btn-sm">収穫</a>

    <!--  グラフの描画エリア -->
    <div id="chart_div" style="width: 100%; height: 350px"></div>
 
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