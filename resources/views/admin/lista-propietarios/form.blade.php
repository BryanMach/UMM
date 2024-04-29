<div class="form-group {{ $errors->has('idPropietario') ? 'has-error' : ''}}">
    <label for="idPropietario" class="control-label">{{ 'Idpropietario' }}</label>
    <input class="form-control" name="idPropietario" type="number" id="idPropietario" value="{{ isset($listapropietario->idPropietario) ? $listapropietario->idPropietario : ''}}" >
    {!! $errors->first('idPropietario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idArtefacto') ? 'has-error' : ''}}">
    <label for="idArtefacto" class="control-label">{{ 'Idartefacto' }}</label>
    <input class="form-control" name="idArtefacto" type="number" id="idArtefacto" value="{{ isset($listapropietario->idArtefacto) ? $listapropietario->idArtefacto : ''}}" >
    {!! $errors->first('idArtefacto', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
