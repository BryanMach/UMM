<div class="form-group {{ $errors->has('idPersonal') ? 'has-error' : ''}}">
    <label for="idPersonal" class="control-label">{{ 'Idpersonal' }}</label>
    <input class="form-control" name="idPersonal" type="number" id="idPersonal" value="{{ isset($usuario->idPersonal) ? $usuario->idPersonal : ''}}" >
    {!! $errors->first('idPersonal', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('usuario') ? 'has-error' : ''}}">
    <label for="usuario" class="control-label">{{ 'Usuario' }}</label>
    <input class="form-control" name="usuario" type="text" id="usuario" value="{{ isset($usuario->usuario) ? $usuario->usuario : ''}}" >
    {!! $errors->first('usuario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('contrasena') ? 'has-error' : ''}}">
    <label for="contrasena" class="control-label">{{ 'Contraseña' }}</label>
    <input class="form-control" name="contrasena" type="text" id="contrasena" value="{{ isset($usuario->contrasena) ? $usuario->contrasena : ''}}" >
    {!! $errors->first('contrasena', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nivel') ? 'has-error' : ''}}">
    <label for="nivel" class="control-label">{{ 'Nivel' }}</label>
    <input class="form-control" name="nivel" type="number" id="nivel" value="{{ isset($usuario->nivel) ? $usuario->nivel : ''}}" >
    {!! $errors->first('nivel', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nivel') ? 'has-error' : ''}}">
    <label for="nivel" class="control-label">{{ 'Nivel' }}</label>
    <input class="form-control" name="nivel" type="number" id="nivel" value="{{ isset($usuario->nivel) ? $usuario->nivel : ''}}" >
    {!! $errors->first('nivel', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Añadir' }}">
</div>
