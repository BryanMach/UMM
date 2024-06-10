<div class="form-group {{ $errors->has('cargo') ? 'has-error' : ''}}">
    <label for="cargo" class="control-label">{{ 'CARGO' }}</label>
    <input class="form-control" name="cargo" type="text" id="cargo" oninput="this.value = this.value.toUpperCase()" value="{{ isset($cargo->cargo) ? $cargo->cargo : ''}}" >
    {!! $errors->first('cargo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'ACTUALIZAR' : 'CREAR' }}">
</div>
