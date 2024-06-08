<div class="form-group {{ $errors->has('idArtefacto') ? 'has-error' : '' }}">
    <label for="idArtefacto" class="control-label">{{ 'ARTEFACTOS NAVALES' }}</label>
    <select class="form-control" name="idArtefacto" id="idArtefacto">
        @foreach ($artefactos as $artefacto)
            <option value="{{ $artefacto->id }}">
                {{ $artefacto->matricula }}</option>
        @endforeach
    </select>
    {!! $errors->first('idArtefacto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lugar') ? 'has-error' : '' }}">
    <label for="lugar" class="control-label">{{ 'LUGAR' }}</label>
    <input class="form-control" name="lugar" type="text" id="lugar"
        value="{{ isset($datosadicionale->lugar) ? $datosadicionale->lugar : '' }}">
    {!! $errors->first('lugar', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mercPelig') ? 'has-error' : '' }}">
    <label for="mercPelig" class="control-label">{{ 'TRANASPORTA MERCANCIAS PELIGROSAS?' }}</label>
    <select class="form-control" name="mercPelig" type="text" id="mercPelig">
        <option Value="Si">Si</option>
        <option Value="No">No</option>
    </select>
    {!! $errors->first('mercPelig', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('maxPasajeros') ? 'has-error' : '' }}">
    <label for="maxPasajeros" class="control-label">{{ 'NUMERO MAXIMO DE PASAJEROS' }}</label>
    <input class="form-control" name="maxPasajeros" type="number" id="maxPasajeros"
        value="{{ isset($datosadicionale->maxPasajeros) ? $datosadicionale->maxPasajeros : '' }}">
    {!! $errors->first('maxPasajeros', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cargaComb') ? 'has-error' : '' }}">
    <label for="cargaComb" class="control-label">{{ 'CARGACOMB' }}</label>
    <input class="form-control" name="cargaComb" type="number" id="cargaComb"
        value="{{ isset($datosadicionale->cargaComb) ? $datosadicionale->cargaComb : '' }}">
    {!! $errors->first('cargaComb', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('peso') ? 'has-error' : '' }}">
    <label for="peso" class="control-label">{{ 'PESO' }}</label>
    <input class="form-control" name="peso" type="number" id="peso"
        value="{{ isset($datosadicionale->peso) ? $datosadicionale->peso : '' }}">
    {!! $errors->first('peso', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('altura') ? 'has-error' : '' }}">
    <label for="altura" class="control-label">{{ 'ALTURA' }}</label>
    <input class="form-control" name="altura" type="number" id="altura"
        value="{{ isset($datosadicionale->altura) ? $datosadicionale->altura : '' }}">
    {!! $errors->first('altura', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Añadir' }}">
</div>
