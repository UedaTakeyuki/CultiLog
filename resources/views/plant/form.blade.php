<div class="form-group">
            {!! Form::label('name', '品種名:') !!}
            {!! Form::text('name', $name, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('kana', 'ヨミガナ:') !!}
            {!! Form::text('kana', $kana, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('alias', '別名:') !!}
            {!! Form::text('alias', $alias, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit($submitButton_title, ['class' => 'btn btn-primary form-control']) !!}
        </div>