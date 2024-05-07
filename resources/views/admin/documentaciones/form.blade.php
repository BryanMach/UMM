<div class="form-group {{ $errors->has('idArtefacto') ? 'has-error' : '' }}">
    <label for="idArtefacto" class="control-label">{{ 'Artefacto' }}</label>
    <select class="form-control" name="idArtefacto" id="idArtefacto">
        @foreach ($artefactos as $artefacto)
            <option value="{{ $artefacto->id }}">{{ $artefacto->matricula }}</option>
        @endforeach
    </select>
    {!! $errors->first('idArtefacto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('directorio') ? 'has-error' : '' }}">
    <label for="directorio" class="control-label">{{ 'Directorio' }}</label>
    <input class="form-control" name="directorio" type="text" id="directorio"
        value="{{ isset($documentacione->directorio) ? $documentacione->directorio : '' }}">
    {!! $errors->first('directorio', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Añadir' }}">
</div>
