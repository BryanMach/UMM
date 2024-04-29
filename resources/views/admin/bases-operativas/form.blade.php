<div class="form-group {{ $errors->has('idCuenca') ? 'has-error' : ''}}">
    <label for="idCuenca" class="control-label">{{ 'Idcuenca' }}</label>
    <input class="form-control" name="idCuenca" type="number" id="idCuenca" value="{{ isset($basesoperativa->idCuenca) ? $basesoperativa->idCuenca : ''}}" >
    {!! $errors->first('idCuenca', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('baseOperativa') ? 'has-error' : ''}}">
    <label for="baseOperativa" class="control-label">{{ 'Baseoperativa' }}</label>
    <input class="form-control" name="baseOperativa" type="text" id="baseOperativa" value="{{ isset($basesoperativa->baseOperativa) ? $basesoperativa->baseOperativa : ''}}" >
    {!! $errors->first('baseOperativa', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
