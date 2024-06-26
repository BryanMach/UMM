<div class="form-group {{ $errors->has('idUsuarios') ? 'has-error' : '' }}">
    <label for="idUsuarios" class="control-label">{{ 'USUARIOS' }}</label>
    <select class="form-control" name="idUsuarios" id="idUsuarios">
        @foreach ($usuarios as $usuario)
            <option value="{{ $usuario->id }}">{{ $usuario->usuario }}</option>
        @endforeach
    </select>
    {!! $errors->first('idUsuarios', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idBaseOperativa') ? 'has-error' : '' }}">
    <label for="idBaseOperativa" class="control-label">{{ 'BASES DE OPERACIONES' }}</label>
    <select class="form-control" name="idBaseOperativa" id="idBaseOperativa">
        @foreach ($basesoperativas as $base)
            @if ($formMode == 'edit')
                @if ($base->id == $artefacto->idBaseOperativa)
                    <option value="{{ $base->id }}" selected>{{ $base->baseOperativa }}</option>
                @else
                    <option value="{{ $base->id }}">{{ $base->baseOperativa }}</option>
                @endif
            @else
                <option value="{{ $base->id }}">{{ $base->baseOperativa }}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('idBaseOperativa', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idBaseOperativa') ? 'has-error' : '' }}">
    <div class="form-group {{ $errors->has('matricula') ? 'has-error' : '' }}">
        <label for="matricula" class="control-label">{{ 'MATRICULA' }}</label>
        <input class="form-control" name="matricula" type="text" oninput="this.value = this.value.toUpperCase()"  id="matricula"
            value="{{ isset($artefacto->matricula) ? $artefacto->matricula : '' }}">
        {!! $errors->first('matricula', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
        <label for="nombre" class="control-label">{{ 'NOMBRE' }}</label>
        <input class="form-control" name="nombre" type="text" oninput="this.value = this.value.toUpperCase()"  id="nombre"
            value="{{ isset($artefacto->nombre) ? $artefacto->nombre : '' }}">
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('idTipo') ? 'has-error' : '' }}">
        <label for="idTipo" class="control-label">{{ 'TIPO' }}</label>
        <select class="form-control" name="idTipo" id="idTipo">
            @foreach ($tipos as $tipo)
                @if ($formMode == 'edit')
                    @if ($tipo->id == $artefacto->idTipo)
                        <option value="{{ $tipo->id }}" selected>{{ $tipo->tipo }}</option>
                    @else
                        <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                    @endif
                @else
                    <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                @endif
            @endforeach
        </select>
        {!! $errors->first('idTipo', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('idMaterial') ? 'has-error' : '' }}">
        <label for="idMaterial" class="control-label">{{ 'MATERIAL' }}</label>
        <select class="form-control" name="idMaterial" id="idMaterial">
            @foreach ($materiales as $material)
                @if ($formMode == 'edit')
                    @if ($material->id == $artefacto->idMaterial)
                        <option value="{{ $material->id }}" selected>{{ $material->material }}</option>
                    @else
                        <option value="{{ $material->id }}">{{ $material->material }}</option>
                    @endif
                @else
                    <option value="{{ $material->id }}">{{ $material->material }}</option>
                @endif
            @endforeach
        </select>
        {!! $errors->first('idMaterial', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group {{ $errors->has('eslora') ? 'has-error' : '' }}">
        <label for="eslora" class="control-label">{{ 'ESLORA' }}</label>
        <input class="form-control" name="eslora" type="decimal" id="eslora"
            value="{{ isset($artefacto->eslora) ? $artefacto->eslora : '' }}">
        {!! $errors->first('eslora', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('manga') ? 'has-error' : '' }}">
        <label for="manga" class="control-label">{{ 'MANGA' }}</label>
        <input class="form-control" name="manga" type="decimal" id="manga"
            value="{{ isset($artefacto->manga) ? $artefacto->manga : '' }}">
        {!! $errors->first('manga', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('puntal') ? 'has-error' : '' }}">
        <label for="puntal" class="control-label">{{ 'PUNTAL' }}</label>
        <input class="form-control" name="puntal" type="decimal" id="puntal"
            value="{{ isset($artefacto->puntal) ? $artefacto->puntal : '' }}">
        {!! $errors->first('puntal', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('francobordo') ? 'has-error' : '' }}">
        <label for="francobordo" class="control-label">{{ 'FRANCOBORDO' }}</label>
        <input class="form-control" name="francobordo" type="decimal" id="francobordo"
            value="{{ isset($artefacto->francobordo) ? $artefacto->francobordo : '' }}">
        {!! $errors->first('francobordo', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('propulsion') ? 'has-error' : '' }}">
        <label for="propulsion" class="control-label">{{ 'PROPULSION' }}</label>
        <input class="form-control" name="propulsion" type="text" oninput="this.value = this.value.toUpperCase()"  id="propulsion"
            value="{{ isset($artefacto->propulsion) ? $artefacto->propulsion : '' }}">
        {!! $errors->first('propulsion', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('construccion') ? 'has-error' : '' }}">
        <label for="construccion" class="control-label">{{ 'CONSTRUCCION' }}</label>
        <input class="form-control" name="construccion" type="text" oninput="this.value = this.value.toUpperCase()"  id="construccion"
            value="{{ isset($artefacto->construccion) ? $artefacto->construccion : '' }}">
        {!! $errors->first('construccion', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('trn') ? 'has-error' : '' }}">
        <label for="trn" class="control-label">{{ 'TRN' }}</label>
        <input class="form-control" name="trn" type="decimal" id="trn"
            value="{{ isset($artefacto->trn) ? $artefacto->trn : '' }}">
        {!! $errors->first('trn', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('trb') ? 'has-error' : '' }}">
        <label for="trb" class="control-label">{{ 'TRB' }}</label>
        <input class="form-control" name="trb" type="decimal" id="trb"
            value="{{ isset($artefacto->trb) ? $artefacto->trb : '' }}">
        {!! $errors->first('trb', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('servicio') ? 'has-error' : '' }}">
        <label for="servicio" class="control-label">{{ 'SERVICIO' }}</label>
        <input class="form-control" name="servicio" type="text" oninput="this.value = this.value.toUpperCase()"  id="servicio"
            value="{{ isset($artefacto->servicio->servicio) ? $artefacto->servicio->servicio : '' }}">
        {!! $errors->first('servicio', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('asociacion') ? 'has-error' : '' }}">
        <label for="asociacion" class="control-label">{{ 'ASOCIACION' }}</label>
        <input class="form-control" name="asociacion" type="text" oninput="this.value = this.value.toUpperCase()"  id="asociacion"
            value="{{ isset($artefacto->asociacion) ? $artefacto->asociacion : '' }}">
        {!! $errors->first('asociacion', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('observaciones') ? 'has-error' : '' }}">
        <label for="observaciones" class="control-label">{{ 'OBSERVACIONES' }}</label>
        <input class="form-control" name="observaciones" type="text" oninput="this.value = this.value.toUpperCase()"  id="observaciones"
            value="{{ isset($artefacto->observaciones) ? $artefacto->observaciones : '' }}">
        {!! $errors->first('observaciones', '<p class="help-block">:message</p>') !!}
    </div>


    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'ACTUALIZAR' : 'Añadir' }}">
    </div>
