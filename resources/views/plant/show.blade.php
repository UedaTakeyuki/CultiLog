@extends('layout4_plant_active')

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
      @foreach($plant->plantings as $planting)
      @foreach($planting->harvestings as $harvesting)
      [ {{$harvesting->duration()}} , {{$harvesting->weight}} ],
      @endforeach
      @endforeach
    ]);
 
    // オプションの設定
    var options = {
      title: '収穫散布',
      hAxis: {title: '栽培日数'},   // 水平の説明,
      vAxis: {title: '重さ(グラム)'},   // 垂直の説明
      legend: 'none'                  // 凡例なし    
     };

    @if ($plant->harvestings_num() != 0)
      // 指定されたIDの要素に散布図を作成
      var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));
      // グラフの描画
      chart.draw(data, options);
    @endif
  }
</script>
@endsection

@section('content')
{{ $plant->kana }}
    <h1>{{ $plant->name }}
      {!! link_to(action('PlantController@edit', [$plant->id]), '編集', ['class' => 'btn btn-primary']) !!}
    </h1>
 
    <hr/>
 
    <h3>別名：{{ $plant->alias }}</h3><br>

    @if ($plant->harvestings_num() != 0)
    <h3> 収穫散布図 </h3>
    <!--  グラフの描画エリア -->
    <div id="chart_div" style="width: 100%; height: 350px"></div>
    @endif
    
    <hr/>

    <h3>定植</h3><br>
    <table class="table table-striped">
        @foreach($plant->plantings as $planting)
            <tr>
                <td>
                    <a href="{{ url('planting', $planting->id) }}" data-ajax="false" >
                    {{$planting->planted_at}}
                    </a>
                </td>
                <td>
                    {{$planting->shelf->name}}
                </td>
            </tr>
        @endforeach
    </table>
    <iframe src="http://images.search.biglobe.ne.jp/cgi-bin/search?q={{$plant->name}}" height="600" width="100%" frameborder="0" allowfullscreen></iframe>
@endsection