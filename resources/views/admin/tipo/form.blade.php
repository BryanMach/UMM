<div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
    <label for="tipo" class="control-label">{{ 'TIPO' }}</label>
    <input class="form-control" name="tipo" type="text" id="tipo"
        value="{{ isset($tipo->tipo) ? $tipo->tipo : '' }}">
    {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Añadir' }}">
</div>
