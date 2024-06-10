<div class="form-group {{ $errors->has('cuenca') ? 'has-error' : '' }}">
    <label for="cuenca" class="control-label">{{ 'CUENCA' }}</label>
    <input class="form-control" name="cuenca" type="text" oninput="this.value = this.value.toUpperCase()"  id="cuenca"
        value="{{ isset($cuenca->cuenca) ? $cuenca->cuenca : '' }}">
    {!! $errors->first('cuenca', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'ACTUALIZAR' : 'Añadir' }}">
</div>
