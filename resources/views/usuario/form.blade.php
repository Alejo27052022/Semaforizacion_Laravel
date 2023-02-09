<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('codigo') }}
            {{ Form::text('codigo', $usuario->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) }}
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ced_user') }}
            {{ Form::text('ced_user', $usuario->ced_user, ['class' => 'form-control' . ($errors->has('ced_user') ? ' is-invalid' : ''), 'placeholder' => 'Ced User']) }}
            {!! $errors->first('ced_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nom_user') }}
            {{ Form::text('nom_user', $usuario->nom_user, ['class' => 'form-control' . ($errors->has('nom_user') ? ' is-invalid' : ''), 'placeholder' => 'Nom User']) }}
            {!! $errors->first('nom_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('last_user') }}
            {{ Form::text('last_user', $usuario->last_user, ['class' => 'form-control' . ($errors->has('last_user') ? ' is-invalid' : ''), 'placeholder' => 'Last User']) }}
            {!! $errors->first('last_user', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direc') }}
            {{ Form::text('direc', $usuario->direc, ['class' => 'form-control' . ($errors->has('direc') ? ' is-invalid' : ''), 'placeholder' => 'Direc']) }}
            {!! $errors->first('direc', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $usuario->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $usuario->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pass') }}
            {{ Form::text('pass', $usuario->pass, ['class' => 'form-control' . ($errors->has('pass') ? ' is-invalid' : ''), 'placeholder' => 'Pass']) }}
            {!! $errors->first('pass', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>