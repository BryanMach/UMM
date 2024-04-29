<div class="form-group {{ $errors->has('cuenca') ? 'has-error' : ''}}">
    <label for="cuenca" class="control-label">{{ 'Cuenca' }}</label>
    <input class="form-control" name="cuenca" type="text" id="cuenca" value="{{ isset($cuenca->cuenca) ? $cuenca->cuenca : ''}}" >
    {!! $errors->first('cuenca', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
