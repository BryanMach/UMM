<div class="form-group {{ $errors->has('idPropietario') ? 'has-error' : '' }}">
    <label for="idPropietario" class="control-label">{{ 'LISTA DE PROPIETARIOS' }}</label>
    <select class="form-control" name="idPropietario" id="idPropietario">
        @foreach ($propietarios as $propietario)
            <option value="{{ $propietario->id }}">
                {{ $propietario->identificador }} {{ $propietario->nombre }}</option>
        @endforeach
    </select>
    {!! $errors->first('idPropietario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idArtefacto') ? 'has-error' : '' }}">
    <label for="idArtefacto" class="control-label">{{ 'ARTEFACTO NAVAL' }}</label>
    <select class="form-control" name="idArtefacto" id="idArtefacto">
        @foreach ($artefactos as $artefacto)
            <option value="{{ $artefacto->id }}">{{ $artefacto->matricula }}</option>
        @endforeach
    </select>
    {!! $errors->first('idArtefacto', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'ACTUALIZAR' : 'Añadir' }}">
</div>
