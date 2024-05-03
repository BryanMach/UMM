<!--<div class="form-group {{ $errors->has('idUsuarios') ? 'has-error' : ''}}">
    <label for="idUsuarios" class="control-label">{{ 'Idusuarios' }}</label>
    <input class="form-control" name="idUsuarios" type="number" id="idUsuarios" value="{{ isset($artefacto->idUsuarios) ? $artefacto->idUsuarios : ''}}" >
    {!! $errors->first('idUsuarios', '<p class="help-block">:message</p>') !!}
</div>-->
<div class="form-group {{ $errors->has('idUsuarios') ? 'has-error' : ''}}">
    <label for="idUsuarios" class="control-label">{{ 'Usuarios' }}</label>
    <select class="form-control" name="idUsuarios" id="idUsuarios">
        @foreach ($usuarios as $usuario)
            <option value="{{$usuario->id}}">{{$usuario->usuario}}</option>
        @endforeach
    </select>
    {!! $errors->first('idUsuarios', '<p class="help-block">:message</p>') !!}
</div>
<!--<div class="form-group {{ $errors->has('idBaseOperativa') ? 'has-error' : ''}}">
    <label for="idBaseOperativa" class="control-label">{{ 'Idbaseoperativa' }}</label>
    <input class="form-control" name="idBaseOperativa" type="number" id="idBaseOperativa" value="{{ isset($artefacto->idBaseOperativa) ? $artefacto->idBaseOperativa : ''}}" >
    {!! $errors->first('idBaseOperativa', '<p class="help-block">:message</p>') !!}
</div>-->
<div class="form-group {{ $errors->has('idBaseOperativa') ? 'has-error' : ''}}">
    <label for="idBaseOperativa" class="control-label">{{ 'Base operativa' }}</label>
    <select class="form-control" name="idBaseOperativa" id="idBaseOperativa">
        @foreach ($basesoperativas as $baseoperativa)
            <option value="{{$baseoperativa->id}}">{{$baseoperativa->baseOperativa}}</option>
        @endforeach
    </select>
    {!! $errors->first('idBaseOperativa', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('matricula') ? 'has-error' : ''}}">
    <label for="matricula" class="control-label">{{ 'Matricula' }}</label>
    <input class="form-control" name="matricula" type="text" id="matricula" value="{{ isset($artefacto->matricula) ? $artefacto->matricula : ''}}" >
    {!! $errors->first('matricula', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($artefacto->nombre) ? $artefacto->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idTipo') ? 'has-error' : ''}}">
    <label for="idTipo" class="control-label">{{ 'Tipo' }}</label>
    <input class="form-control" name="idTipo" type="number" id="idTipo" value="{{ isset($artefacto->idTipo) ? $artefacto->tipos->tipo : ''}}" >
    {!! $errors->first('idTipo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idMaterial') ? 'has-error' : ''}}">
    <label for="idMaterial" class="control-label">{{ 'Material' }}</label>
    <input class="form-control" name="idMaterial" type="number" id="idMaterial" value="{{ isset($artefacto->idMaterial) ? $artefacto->materials->material : ''}}" >
    {!! $errors->first('idMaterial', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('eslora') ? 'has-error' : ''}}">
    <label for="eslora" class="control-label">{{ 'Eslora' }}</label>
    <input class="form-control" name="eslora" type="number" id="eslora" value="{{ isset($artefacto->eslora) ? $artefacto->eslora : ''}}" >
    {!! $errors->first('eslora', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('manga') ? 'has-error' : ''}}">
    <label for="manga" class="control-label">{{ 'Manga' }}</label>
    <input class="form-control" name="manga" type="number" id="manga" value="{{ isset($artefacto->manga) ? $artefacto->manga : ''}}" >
    {!! $errors->first('manga', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('puntal') ? 'has-error' : ''}}">
    <label for="puntal" class="control-label">{{ 'Puntal' }}</label>
    <input class="form-control" name="puntal" type="number" id="puntal" value="{{ isset($artefacto->puntal) ? $artefacto->puntal : ''}}" >
    {!! $errors->first('puntal', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('francobordo') ? 'has-error' : ''}}">
    <label for="francobordo" class="control-label">{{ 'Francobordo' }}</label>
    <input class="form-control" name="francobordo" type="number" id="francobordo" value="{{ isset($artefacto->francobordo) ? $artefacto->francobordo : ''}}" >
    {!! $errors->first('francobordo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('propulsion') ? 'has-error' : ''}}">
    <label for="propulsion" class="control-label">{{ 'Propulsion' }}</label>
    <input class="form-control" name="propulsion" type="text" id="propulsion" value="{{ isset($artefacto->propulsion) ? $artefacto->propulsion : ''}}" >
    {!! $errors->first('propulsion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('construccion') ? 'has-error' : ''}}">
    <label for="construccion" class="control-label">{{ 'Construccion' }}</label>
    <input class="form-control" name="construccion" type="text" id="construccion" value="{{ isset($artefacto->construccion) ? $artefacto->construccion : ''}}" >
    {!! $errors->first('construccion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('trn') ? 'has-error' : ''}}">
    <label for="trn" class="control-label">{{ 'Trn' }}</label>
    <input class="form-control" name="trn" type="number" id="trn" value="{{ isset($artefacto->trn) ? $artefacto->trn : ''}}" >
    {!! $errors->first('trn', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('trb') ? 'has-error' : ''}}">
    <label for="trb" class="control-label">{{ 'Trb' }}</label>
    <input class="form-control" name="trb" type="number" id="trb" value="{{ isset($artefacto->trb) ? $artefacto->trb : ''}}" >
    {!! $errors->first('trb', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('servicio') ? 'has-error' : ''}}">
    <label for="servicio" class="control-label">{{ 'Servicio' }}</label>
    <input class="form-control" name="servicio" type="text" id="servicio" value="{{ isset($artefacto->servicio) ? $artefacto->servicio : ''}}" >
    {!! $errors->first('servicio', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('asociacion') ? 'has-error' : ''}}">
    <label for="asociacion" class="control-label">{{ 'Asociacion' }}</label>
    <input class="form-control" name="asociacion" type="text" id="asociacion" value="{{ isset($artefacto->asociacion) ? $artefacto->asociacion : ''}}" >
    {!! $errors->first('asociacion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('observaciones') ? 'has-error' : ''}}">
    <label for="observaciones" class="control-label">{{ 'Observaciones' }}</label>
    <input class="form-control" name="observaciones" type="text" id="observaciones" value="{{ isset($artefacto->observaciones) ? $artefacto->observaciones : ''}}" >
    {!! $errors->first('observaciones', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Añadir' }}">
</div>
