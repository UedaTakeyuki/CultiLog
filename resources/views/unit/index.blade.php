@extends('layout2')
 
@section('content')
    <h1>Units</h1>
 
    <hr/>
     
    <div class="container-fluid">
        @foreach($units as $unit)
            <div class="col-md-3 col-sm-4 col-xs-12">
                <table class="table">
                    <tbody>
                        <tr class="info">
                            <td>
                                <!-- <a href="{{ url('unit', $unit->id) }}"> -->
                                棚{{ $unit->name }}
                                <!-- </a> -->
                                <div class="pull-right"><h6>栽培日数</h6></div>
                            </td>
                        </tr>
                        @foreach($unit->shelves as $shelf)
                            <tr>
                                <td>
                                    <a href="{{ url('shelf', $shelf->id) }}" data-ajax="false" >
                                      {{$shelf->name}}
                                    </a>
                                    <br>
                                    ぐげげげげ<span class="badge">26</span><br>
                                    あああああ<span class="badge">26</span><br>
                                    けろけろ<span class="badge pull-right">26</span><br>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- <div class="col-md-3 col-sm-4 col-xs-12"> -->
        @endforeach
    </div><!-- <div class="container-fluid"> -->
@endsection