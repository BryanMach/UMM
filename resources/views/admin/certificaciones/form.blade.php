<div class="form-group {{ $errors->has('idCuenca') ? 'has-error' : '' }}">
    <label for="idCuenca" class="control-label">{{ 'CUENCAS' }}</label>
    <select class="form-control" name="idCuenca" id="idCuenca">
        @foreach ($cuencas as $cuenca)
            <option value="{{ $cuenca->id }}">
                {{ $cuenca->cuenca }} </option>
        @endforeach
    </select>
    {!! $errors->first('idCuenca', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('numero') ? 'has-error' : '' }}">
    <label for="numero" class="control-label">{{ 'NUMERO' }}</label>
    <input class="form-control" name="numero" type="number" id="numero"
        value="{{ isset($certificacione->numero) ? $certificacione->numero : '' }}">
    {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Añadir' }}">
</div>
