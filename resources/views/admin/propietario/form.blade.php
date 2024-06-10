<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
    <label for="nombre" class="control-label">{{ 'NOMBRE' }}</label>
    <input class="form-control" name="nombre" type="text" oninput="this.value = this.value.toUpperCase()"  id="nombre"
        value="{{ isset($propietario->nombre) ? $propietario->nombre : '' }}">
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
    <label for="tipo" class="control-label">{{ 'TIPO' }}</label>
    <div class="radio">
        <label><input name="tipo" type="radio" value="1"
                {{ isset($propietario) && 1 == $propietario->tipo ? 'checked' : '' }}> Persona</label>
    </div>
    <div class="radio">
        <label><input name="tipo" type="radio" value="0"
                @if (isset($propietario)) {{ 0 == $propietario->tipo ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            Empresa</label>
    </div>
    {!! $errors->first('tipo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('identificador') ? 'has-error' : '' }}">
    <label for="identificador" class="control-label">{{ 'CI/SEPREC' }}</label>
    <input class="form-control" name="identificador" type="text" oninput="this.value = this.value.toUpperCase()"  id="identificador"
        value="{{ isset($propietario->identificador) ? $propietario->identificador : '' }}">
    {!! $errors->first('identificador', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('FechaIni') ? 'has-error' : '' }}">
    <label for="FechaIni" class="control-label">{{ 'FECHA DE NACIMENTO/ FECHA DE CONSTITUCION' }}</label>
    <input class="form-control" name="FechaIni" type="date" id="FechaIni"
        value="{{ isset($propietario->FechaIni) ? $propietario->FechaIni : '' }}">
    {!! $errors->first('FechaIni', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'ACTUALIZAR' : 'Añadir' }}">
</div>
