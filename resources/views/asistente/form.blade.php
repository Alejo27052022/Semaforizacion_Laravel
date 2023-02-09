<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('nom_asistente') }}
            {{ Form::text('nom_asistente', $asistente->nom_asistente, ['class' => 'form-control' . ($errors->has('nom_asistente') ? ' is-invalid' : ''), 'placeholder' => 'Nom Asistente']) }}
            {!! $errors->first('nom_asistente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('last_asistente') }}
            {{ Form::text('last_asistente', $asistente->last_asistente, ['class' => 'form-control' . ($errors->has('last_asistente') ? ' is-invalid' : ''), 'placeholder' => 'Last Asistente']) }}
            {!! $errors->first('last_asistente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cargo') }}
            {{ Form::text('cargo', $asistente->cargo, ['class' => 'form-control' . ($errors->has('cargo') ? ' is-invalid' : ''), 'placeholder' => 'Cargo']) }}
            {!! $errors->first('cargo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Caso') }}
            {!! Form::select('cod_caso', $options, null, ['class' => 'form-control' . ($errors->has('cod_caso') ? ' is-invalid' : '')])  !!}
            {!! $errors->first('cod_caso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $asistente->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pass') }}
            {{ Form::text('pass', $asistente->pass, ['class' => 'form-control' . ($errors->has('pass') ? ' is-invalid' : ''), 'placeholder' => 'Pass']) }}
            {!! $errors->first('pass', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
