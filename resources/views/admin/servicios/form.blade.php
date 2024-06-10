<div class="form-group {{ $errors->has('servicio') ? 'has-error' : ''}}">
    <label for="servicio" class="control-label">{{ 'SERVICIO' }}</label>
    <input class="form-control" name="servicio" type="text" oninput="this.value = this.value.toUpperCase()"  id="servicio" value="{{ isset($servicio->servicio) ? $servicio->servicio : ''}}" >
    {!! $errors->first('servicio', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'ACTUALIZAR' : 'AÑADIR' }}">
</div>
