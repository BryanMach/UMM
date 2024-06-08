<div class="form-group {{ $errors->has('idCuenca') ? 'has-error' : '' }}">
    <label for="idCuenca" class="control-label">{{ 'CUENCA' }}</label>
    <select class="form-control" name="idCuenca" id="idCuenca">
        @foreach ($cuencas as $cuenca)
            @if ($formMode == 'edit')
                @if ($cuenca->id == $basesoperativa->idCuenca)
                    <option value="{{ $cuenca->id }}" selected>{{ $cuenca->cuenca }}</option>
                @else
                    <option value="{{ $cuenca->id }}">{{ $cuenca->cuenca }}</option>
                @endif
            @else
                <option value="{{ $cuenca->id }}">{{ $cuenca->cuenca }}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('idCuenca', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('baseOperativa') ? 'has-error' : '' }}">
    <label for="baseOperativa" class="control-label">{{ 'BASE DE OPERACIONES' }}</label>
    <input class="form-control" name="baseOperativa" type="text" id="baseOperativa"
        value="{{ isset($basesoperativa->baseOperativa) ? $basesoperativa->baseOperativa : '' }}">
    {!! $errors->first('baseOperativa', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Añadir' }}">
</div>
