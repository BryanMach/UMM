<div class="form-group {{ $errors->has('idCuenca') ? 'has-error' : ''}}">
    <label for="idCuenca" class="control-label">{{ 'Idcuenca' }}</label>
    <input class="form-control" name="idCuenca" type="number" id="idCuenca" value="{{ isset($certificacione->idCuenca) ? $certificacione->idCuenca : ''}}" >
    {!! $errors->first('idCuenca', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('numero') ? 'has-error' : ''}}">
    <label for="numero" class="control-label">{{ 'Numero' }}</label>
    <input class="form-control" name="numero" type="number" id="numero" value="{{ isset($certificacione->numero) ? $certificacione->numero : ''}}" >
    {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
