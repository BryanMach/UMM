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
<div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
    <label for="tipo" class="control-label">{{ 'TIPO DE MOTOR' }}</label>
    <input class="form-control" name="tipo" type="text" id="tipo"
        value="{{ isset($motore->tipo) ? $motore->tipo : '' }}">
    {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('marca') ? 'has-error' : '' }}">
    <label for="marca" class="control-label">{{ 'MARCA DEL MOTOR' }}</label>
    <input class="form-control" name="marca" type="text" id="marca"
        value="{{ isset($motore->marca) ? $motore->marca : '' }}">
    {!! $errors->first('marca', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('numero') ? 'has-error' : '' }}">
    <label for="numero" class="control-label">{{ 'NUMERO' }}</label>
    <input class="form-control" name="numero" type="text" id="numero"
        value="{{ isset($motore->numero) ? $motore->numero : '' }}">
    {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('potencia') ? 'has-error' : '' }}">
    <label for="potencia" class="control-label">{{ 'POTENCIA' }}</label>
    <input class="form-control" name="potencia" type="text" id="potencia"
        value="{{ isset($motore->potencia) ? $motore->potencia : '' }}">
    {!! $errors->first('potencia', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nominalelectrica') ? 'has-error' : '' }}">
    <label for="nominalelectrica" class="control-label">{{ 'POTENCIA NOMINAL ELECTRICA' }}</label>
    <input class="form-control" name="nominalelectrica" type="text" id="nominalelectrica"
        value="{{ isset($motore->nominalelectrica) ? $motore->nominalelectrica : '' }}">
    {!! $errors->first('nominalelectrica', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Añadir' }}">
</div>
