<div class="form-group {{ $errors->has('idUsuario') ? 'has-error' : ''}}">
    <label for="idUsuario" class="control-label">{{ 'Idusuario' }}</label>
    <input class="form-control" name="idUsuario" type="number" id="idUsuario" value="{{ isset($ubicacion->idUsuario) ? $ubicacion->idUsuario : ''}}" >
    {!! $errors->first('idUsuario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idCuenca') ? 'has-error' : ''}}">
    <label for="idCuenca" class="control-label">{{ 'Idcuenca' }}</label>
    <input class="form-control" name="idCuenca" type="number" id="idCuenca" value="{{ isset($ubicacion->idCuenca) ? $ubicacion->idCuenca : ''}}" >
    {!! $errors->first('idCuenca', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idBaseOperativa') ? 'has-error' : ''}}">
    <label for="idBaseOperativa" class="control-label">{{ 'Idbaseoperativa' }}</label>
    <input class="form-control" name="idBaseOperativa" type="number" id="idBaseOperativa" value="{{ isset($ubicacion->idBaseOperativa) ? $ubicacion->idBaseOperativa : ''}}" >
    {!! $errors->first('idBaseOperativa', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
