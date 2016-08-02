@extends('layout3')
 
@section('header_after')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
$(function() {
    $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
});
</script>
@endsection

@section('content')
    <h1>{{$planting->plant->name}}の収穫</h1>
 
    <hr/>
 
    {!! Form::open(['url' => 'harvesting']) !!}
        {{Form::hidden('planting_id', $planting->id)}}
        <div class="form-group">
            {!! Form::label('harvested_at', '収穫日:') !!}
            {!! Form::text('harvested_at', date('Y-m-d'), ['id' => 'datepicker', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('weight', '重さ:') !!}
            {!! Form::text('weight', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('追加', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
@endsection