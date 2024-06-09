<div class="form-group {{ $errors->has('servicio') ? 'has-error' : ''}}">
    <label for="servicio" class="control-label">{{ 'Servicio' }}</label>
    <input class="form-control" name="servicio" type="text" id="servicio" value="{{ isset($servicio->servicio) ? $servicio->servicio : ''}}" >
    {!! $errors->first('servicio', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
