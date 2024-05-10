<div class="form-group {{ $errors->has('idArtefacto') ? 'has-error' : '' }}">
    <label for="idArtefacto" class="control-label">{{ 'Artefactos' }}</label>
    <select class="form-control" name="idArtefacto" id="idArtefacto">
        @foreach ($artefactos as $artefacto)
            <option value="{{ $artefacto->idArtefacto }}">
                {{ $artefacto->matricula }}</option>
        @endforeach
    </select>
    {!! $errors->first('idArtefacto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lugar') ? 'has-error' : '' }}">
    <label for="lugar" class="control-label">{{ 'Lugar' }}</label>
    <input class="form-control" name="lugar" type="text" id="lugar"
        value="{{ isset($datosadicionale->lugar) ? $datosadicionale->lugar : '' }}">
    {!! $errors->first('lugar', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mercPelig') ? 'has-error' : '' }}">
    <label for="mercPelig" class="control-label">{{ 'Mercpelig' }}</label>
    <input class="form-control" name="mercPelig" type="text" id="mercPelig"
        value="{{ isset($datosadicionale->mercPelig) ? $datosadicionale->mercPelig : '' }}">
    {!! $errors->first('mercPelig', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('maxPasajeros') ? 'has-error' : '' }}">
    <label for="maxPasajeros" class="control-label">{{ 'Maxpasajeros' }}</label>
    <input class="form-control" name="maxPasajeros" type="number" id="maxPasajeros"
        value="{{ isset($datosadicionale->maxPasajeros) ? $datosadicionale->maxPasajeros : '' }}">
    {!! $errors->first('maxPasajeros', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cargaComb') ? 'has-error' : '' }}">
    <label for="cargaComb" class="control-label">{{ 'Cargacomb' }}</label>
    <input class="form-control" name="cargaComb" type="number" id="cargaComb"
        value="{{ isset($datosadicionale->cargaComb) ? $datosadicionale->cargaComb : '' }}">
    {!! $errors->first('cargaComb', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('peso') ? 'has-error' : '' }}">
    <label for="peso" class="control-label">{{ 'Peso' }}</label>
    <input class="form-control" name="peso" type="number" id="peso"
        value="{{ isset($datosadicionale->peso) ? $datosadicionale->peso : '' }}">
    {!! $errors->first('peso', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('altura') ? 'has-error' : '' }}">
    <label for="altura" class="control-label">{{ 'Altura' }}</label>
    <input class="form-control" name="altura" type="number" id="altura"
        value="{{ isset($datosadicionale->altura) ? $datosadicionale->altura : '' }}">
    {!! $errors->first('altura', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Añadir' }}">
</div>
