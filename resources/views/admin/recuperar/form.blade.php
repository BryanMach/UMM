<div class="form-group {{ $errors->has('idUsuario') ? 'has-error' : '' }}">
    <label for="idUsuario" class="control-label">{{ 'USUARIO' }}</label>
    <input class="form-control" name="idUsuario" type="number" id="idUsuario"
        value="{{ isset($recuperar->idUsuario) ? $recuperar->idUsuario : '' }}">
    {!! $errors->first('idUsuario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tabla') ? 'has-error' : '' }}">
    <label for="tabla" class="control-label">{{ 'TABLA' }}</label>
    <input class="form-control" name="tabla" type="number" id="tabla"
        value="{{ isset($recuperar->tabla) ? $recuperar->tabla : '' }}">
    {!! $errors->first('tabla', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('posicion') ? 'has-error' : '' }}">
    <label for="posicion" class="control-label">{{ 'POSICION' }}</label>
    <input class="form-control" name="posicion" type="number" id="posicion"
        value="{{ isset($recuperar->posicion) ? $recuperar->posicion : '' }}">
    {!! $errors->first('posicion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('operacion') ? 'has-error' : '' }}">
    <label for="operacion" class="control-label">{{ 'OPERACION' }}</label>
    <input class="form-control" name="operacion" type="number" id="operacion"
        value="{{ isset($recuperar->operacion) ? $recuperar->operacion : '' }}">
    {!! $errors->first('operacion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
    <label for="fecha" class="control-label">{{ 'FECHA' }}</label>
    <input class="form-control" name="fecha" type="date" id="fecha"
        value="{{ isset($recuperar->fecha) ? $recuperar->fecha : '' }}">
    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('campo') ? 'has-error' : '' }}">
    <label for="campo" class="control-label">{{ 'CAMPO' }}</label>
    <input class="form-control" name="campo" type="number" id="campo"
        value="{{ isset($recuperar->campo) ? $recuperar->campo : '' }}">
    {!! $errors->first('campo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('dato') ? 'has-error' : '' }}">
    <label for="dato" class="control-label">{{ 'DATO' }}</label>
    <input class="form-control" name="dato" type="number" id="dato"
        value="{{ isset($recuperar->dato) ? $recuperar->dato : '' }}">
    {!! $errors->first('dato', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'ACTUALIZAR' : 'Añadir' }}">
</div>
