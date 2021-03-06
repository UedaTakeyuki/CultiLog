@extends('layout4_unit_active')

@section('header_after')
<!--<link href="{{ URL::asset('bower_components/jqueryui-datepicker/datepicker.css') }}" rel="stylesheet">
<script src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!--<script src="{{ URL::asset('bower_components/jquery/dist/jquery.min.map') }}"></script>
<script src="{{ URL::asset('bower_components/jqueryui-datepicker/datepicker.js') }}"></script>
<script>
  $(document).ready(function() {
    $('#datepicker').datepicker();
  });
</script>-->

<!--<script src="{{ URL::asset('bower_components/typeahead.js/dist/bloodhound.min.js') }}"></script>
<script src="{{ URL::asset('bower_components/bootstrap3-typeahead/bootstrap3-typeahead.min.js') }}"></script>
<script src="{{ URL::asset('bower_components/typeahead.js/dist/typeahead.bundle.min.js') }}"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
 
<!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
$(function() {
    $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
});

$(document).ready(function(){
$('#basics').typeahead({
	    source:  function (query, process) {
//        return $.get('http://klingsor.uedasoft.com/tools/160728/', { query: query }, function (data) {
//        return $.get('http://cultilog.uedasoft.com/ajaxpro.php', { query: query }, function (data) {
//        return $.get('/ajaxpro.php/', { query: query }, function (data) {
        return $.get('/ajaxpro2/', { query: query }, function (data) {
//        return $.get('https://plants-log-ueda.c9users.io/ajaxpro.php', { query: query }, function (data) {
        		console.log(data);
        		data = $.parseJSON(data);
	            return process(data);
	        });
	    }
	});
});

</script>   
@endsection

@section('content')
<h1>{{ $planting->plant->name }}定植の編集</h1>
    <!-- <a href="/plant" class="btn btn-primary btn-sm">品種一覧</a> -->
          <form method="post" action="/planting/destroy/{{$planting->id}}">
            <input name="_method" type="hidden" value="delete">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" value="データの削除" class="btn btn-danger btn-sm btn-destroy">
          </form>
    <hr/>
 
    {!! Form::model($planting, ['method' => 'PATCH', 'url' => ['planting', $planting->id]]) !!}
        {{Form::hidden('shelf_id', $planting->shelf->id)}}
        <!--
        <div class="form-group">
            {!! Form::label('plant_id', '品種:') !!}
            {!! Form::text('plant_id', $planting->plant->name, ['id' => 'basics', 'class' => 'form-control']) !!}
        </div>
        -->
        <div class="form-group">
            {!! Form::label('shelf_id', '棚:') !!}
            <select  class="form-control" name="shelf_id">
                @foreach($units as $unit)
                    @foreach($unit->shelves as $shelf)
                        <option value="{{$shelf->id}}" {{$shelf->id == $planting->shelf->id ? 'selected' : '' }}>{{$shelf->name}}</option>
                    @endforeach
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('planted_at', '定植日:') !!}
            {!! Form::text('planted_at', $planting->planted_at, ['id' => 'datepicker', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('編集', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
@endsection