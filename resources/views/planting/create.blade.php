@extends('layout3')

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
<h1>定植の追加</h1>
 
    <hr/>
 
    {!! Form::open(['url' => 'planting']) !!}
        <div class="form-group">
            {!! Form::label('shelf_id', '棚:') !!}
            {!! Form::text('shelf_id', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('plant_id', '品種:') !!}
            {!! Form::text('plant_id', null, ['id' => 'basics', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('planted_at', '定植日:') !!}
            {!! Form::text('planted_at', null, ['id' => 'datepicker', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('追加', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
@endsection