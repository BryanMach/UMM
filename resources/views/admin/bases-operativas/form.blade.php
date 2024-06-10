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
    <input class="form-control" name="baseOperativa" type="text" oninput="this.value = this.value.toUpperCase()" id="baseOperativa"
        value="{{ isset($basesoperativa->baseOperativa) ? $basesoperativa->baseOperativa : '' }}">
    {!! $errors->first('baseOperativa', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('departamento') ? 'has-error' : '' }}">
    <label for="departamento" class="control-label">{{ 'DEPARTAMENTO' }}</label>
    <select class="form-control" name="departamento" id="departamento">
        @if ($formMode == 'edit')
            @if ($basesoperativa->departamento == 'LA PAZ')
                <option value="LA PAZ" selected>LA PAZ</option>
            @else
                <option value="LA PAZ">LA PAZ</option>
            @endif
            @if ($basesoperativa->departamento == 'ORURO')
                <option value="ORURO" selected>ORURO</option>
            @else
                <option value="ORURO">ORURO</option>
            @endif
            @if ($basesoperativa->departamento == 'POTOSI')
                <option value="POTOSI" selected>POTOSI</option>
            @else
                <option value="POTOSI">POTOSI</option>
            @endif
            @if ($basesoperativa->departamento == 'COCHABAMBA')
                <option value="COCHABAMBA" selected>COCHABAMBA</option>
            @else
                <option value="COCHABAMBA">COCHABAMBA</option>
            @endif
            @if ($basesoperativa->departamento == 'CHUQUISACA')
                <option value="CHUQUISACA" selected>CHUQUISACA</option>
            @else
                <option value="CHUQUISACA">CHUQUISACA</option>
            @endif
            @if ($basesoperativa->departamento == 'TARIJA')
                <option value="TARIJA" selected>TARIJA</option>
            @else
                <option value="TARIJA">TARIJA</option>
            @endif
            @if ($basesoperativa->departamento == 'PANDO')
                <option value="PANDO" selected>PANDO</option>
            @else
                <option value="PANDO">PANDO</option>
            @endif
            @if ($basesoperativa->departamento == 'BENI')
                <option value="BENI" selected>BENI</option>
            @else
                <option value="BENI">BENI</option>
            @endif
            @if ($basesoperativa->departamento == 'SANTA CRUZ')
                <option value="SANTA CRUZ" selected>SANTA CRUZ</option>
            @else
                <option value="SANTA CRUZ">SANTA CRUZ</option>
            @endif
        @else
            <option value="LA PAZ">LA PAZ</option>
            <option value="ORURO">ORURO</option>
            <option value="POTOSI">POTOSI</option>
            <option value="COCHABAMBA">COCHABAMBA</option>
            <option value="CHUQUISACA">CHUQUISACA</option>
            <option value="TARIJA">TARIJA</option>
            <option value="PANDO">PANDO</option>
            <option value="BENI">BENI</option>
            <option value="SANTA CRUZ">SANTA CRUZ</option>
        @endif
    </select>
    {!! $errors->first('departamento', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('DETALLE') ? 'has-error' : '' }}">
    <label for="DETALLE" class="control-label">{{ 'DETALLE LA UBICACIÓN DE LA BASE: LOCALIDAD, PUEBLO, O LA ESPECIFICACIÓN QUE CONSIDERE MEJOR' }}</label>
    <input class="form-control" name="DETALLE" type="text" oninput="this.value = this.value.toUpperCase()" id="DETALLE"
        value="{{ isset($basesoperativa->DETALLE) ? $basesoperativa->DETALLE : '' }}">
    {!! $errors->first('DETALLE', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'ACTUALIZAR' : 'Añadir' }}">
</div>
