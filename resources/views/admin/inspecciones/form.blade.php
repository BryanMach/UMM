<div class="form-group {{ $errors->has('idArtefacto') ? 'has-error' : '' }}">
    <label for="idArtefacto" class="control-label">{{ 'Artefacto' }}</label>
    <select class="form-control" name="idArtefacto" id="idArtefacto">
        @foreach ($artefactos as $artefacto)
            @if ($formMode == 'edit')
                @if ( $artefacto->id ==  $inspeccione->idArtefacto )
                    <option value="{{ $artefacto->id }}" selected>{{ $artefacto->matricula }}</option>
                @else
                    <option value="{{ $artefacto->id }}">{{ $artefacto->matricula }}</option>
                @endif
            @else
                <option value="{{ $artefacto->id }}">{{ $artefacto->matricula }}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('idArtefacto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('gestion') ? 'has-error' : '' }}">
    <label for="gestion" class="control-label">{{ 'Gestion' }}</label>
    <input class="form-control" name="gestion" type="text" id="gestion"
        value="{{ isset($inspeccione->gestion) ? $inspeccione->gestion : '' }}">
    {!! $errors->first('gestion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('jefeinspector') ? 'has-error' : '' }}">
    <label for="jefeinspector" class="control-label">{{ 'Jefe de inspección' }}</label>
    <input class="form-control" name="jefeinspector" type="text" id="jefeinspector"
        value="{{ isset($inspeccione->jefeinspector) ? $inspeccione->jefeinspector : '' }}">
    {!! $errors->first('jefeinspector', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('motivo') ? 'has-error' : '' }}">
    <label for="motivo" class="control-label">{{ 'motivo' }}</label>
    <input class="form-control" name="motivo" type="text" id="motivo"
        value="{{ isset($inspeccione->motivo) ? $inspeccione->motivo : '' }}">
    {!! $errors->first('motivo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Añadir' }}">
</div>
