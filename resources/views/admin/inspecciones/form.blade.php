<div class="form-group {{ $errors->has('idArtefacto') ? 'has-error' : ''}}">
    <label for="idArtefacto" class="control-label">{{ 'Idartefacto' }}</label>
    <input class="form-control" name="idArtefacto" type="number" id="idArtefacto" value="{{ isset($inspeccione->idArtefacto) ? $inspeccione->idArtefacto : ''}}" >
    {!! $errors->first('idArtefacto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('gestion') ? 'has-error' : ''}}">
    <label for="gestion" class="control-label">{{ 'Gestion' }}</label>
    <input class="form-control" name="gestion" type="text" id="gestion" value="{{ isset($inspeccione->gestion) ? $inspeccione->gestion : ''}}" >
    {!! $errors->first('gestion', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Añadir' }}">
</div>
