<div class="form-group {{ $errors->has('tipoC') ? 'has-error' : '' }}">
    <label for="tipoC" class="control-label">{{ 'TIPO DE CERTIFICADO' }}</label>
    <input class="form-control" name="tipoC" type="number" id="tipoC"
        value="{{ isset($certificado->tipoC) ? $certificado->tipoC : '' }}">
    {!! $errors->first('tipoC', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nreg') ? 'has-error' : '' }}">
    <label for="nreg" class="control-label">{{ 'NUMERO DE REGISTRO' }}</label>
    <input class="form-control" name="nreg" type="number" id="nreg"
        value="{{ isset($certificado->nreg) ? $certificado->nreg : '' }}">
    {!! $errors->first('nreg', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('correlativo') ? 'has-error' : '' }}">
    <label for="correlativo" class="control-label">{{ 'CORRELATIVO' }}</label>
    <input class="form-control" name="correlativo" type="number" id="correlativo"
        value="{{ isset($certificado->correlativo) ? $certificado->correlativo : '' }}">
    {!! $errors->first('correlativo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fechaEmision') ? 'has-error' : '' }}">
    <label for="fechaEmision" class="control-label">{{ 'FECHA DE EMISION' }}</label>
    <input class="form-control" name="fechaEmision" type="date" id="fechaEmision"
        value="{{ isset($certificado->fechaEmision) ? $certificado->fechaEmision : '' }}">
    {!! $errors->first('fechaEmision', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fechaVecimiento') ? 'has-error' : '' }}">
    <label for="fechaVecimiento" class="control-label">{{ 'FECHA DE VENCIMIENTO' }}</label>
    <input class="form-control" name="fechaVecimiento" type="date" id="fechaVecimiento"
        value="{{ isset($certificado->fechaVecimiento) ? $certificado->fechaVecimiento : '' }}">
    {!! $errors->first('fechaVecimiento', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idArtefactos') ? 'has-error' : '' }}">
    <label for="idArtefactos" class="control-label">{{ 'ARTEFACTO NAVAL' }}</label>
    <input class="form-control" name="idArtefactos" type="number" id="idArtefactos"
        value="{{ isset($certificado->idArtefactos) ? $certificado->idArtefactos : '' }}">
    {!! $errors->first('idArtefactos', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
