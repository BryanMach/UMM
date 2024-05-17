<div class="form-group {{ $errors->has('tipo') ? 'has-error' : ''}}">
    <label for="tipo" class="control-label">{{ 'Tipo' }}</label>
    <input class="form-control" name="tipo" type="number" id="tipo" value="{{ isset($certificado->tipo) ? $certificado->tipo : ''}}" >
    {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nreg') ? 'has-error' : ''}}">
    <label for="nreg" class="control-label">{{ 'Nreg' }}</label>
    <input class="form-control" name="nreg" type="number" id="nreg" value="{{ isset($certificado->nreg) ? $certificado->nreg : ''}}" >
    {!! $errors->first('nreg', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fechaEmision') ? 'has-error' : ''}}">
    <label for="fechaEmision" class="control-label">{{ 'Fechaemision' }}</label>
    <input class="form-control" name="fechaEmision" type="date" id="fechaEmision" value="{{ isset($certificado->fechaEmision) ? $certificado->fechaEmision : ''}}" >
    {!! $errors->first('fechaEmision', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fechaVecimiento') ? 'has-error' : ''}}">
    <label for="fechaVecimiento" class="control-label">{{ 'Fechavecimiento' }}</label>
    <input class="form-control" name="fechaVecimiento" type="date" id="fechaVecimiento" value="{{ isset($certificado->fechaVecimiento) ? $certificado->fechaVecimiento : ''}}" >
    {!! $errors->first('fechaVecimiento', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idArtefactos') ? 'has-error' : ''}}">
    <label for="idArtefactos" class="control-label">{{ 'Idartefactos' }}</label>
    <input class="form-control" name="idArtefactos" type="number" id="idArtefactos" value="{{ isset($certificado->idArtefactos) ? $certificado->idArtefactos : ''}}" >
    {!! $errors->first('idArtefactos', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
