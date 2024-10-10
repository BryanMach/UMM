<div class="form-group {{ $errors->has('idUsuarios') ? 'has-error' : '' }}">
    <label for="idUsuarios" class="control-label">{{ 'USUARIO' }}</label>
    <select class="form-control" name="idUsuarios" id="idUsuarios" disabled>
        @foreach ($usuarios as $usuario)
            <option value="{{ $usuario->id }}">{{ $usuario->usuario }}</option>
        @endforeach
    </select>
    {!! $errors->first('idUsuarios', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
    <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
        <label for="nombre" class="control-label">{{ 'NOMBRE' }}</label>
        <input class="form-control" name="nombre" type="text" oninput="this.value = this.value.toUpperCase()"
            id="nombre" value="{{ isset($personas->nombres) ? $personas->nombres : '' }}">
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('apellido') ? 'has-error' : '' }}">
        <label for="apellido" class="control-label">{{ 'APELLIDOS' }}</label>
        <input class="form-control" name="apellido" type="text" oninput="this.value = this.value.toUpperCase()"
            id="apellido" value="{{ isset($personas->apellido) ? $personas->apellido : '' }}">
        {!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group {{ $errors->has('CI') ? 'has-error' : '' }}">
        <label for="CI" class="control-label">{{ 'NUMERO DE CARNET' }}</label>
        <input class="form-control" name="CI" type="decimal" id="CI"
            value="{{ isset($personas->CI) ? $personas->CI : '' }}">
        {!! $errors->first('CI', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('cargo') ? 'has-error' : '' }}">
        <label for="cargo" class="control-label">{{ 'CARGO' }}</label>
        <input class="form-control" name="cargo" type="decimal" id="cargo"
            value="{{ isset($personas->cargo) ? $personas->cargo : '' }}">
        {!! $errors->first('cargo', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('lugarNac') ? 'has-error' : '' }}">
        <label for="lugarNac" class="control-label">{{ 'LUGAR DE NACIMIENTO' }}</label>
        <input class="form-control" name="lugarNac" type="decimal" id="lugarNac"
            value="{{ isset($personas->lugarNac) ? $personas->lugarNac : '' }}">
        {!! $errors->first('lugarNac', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('fechaNac') ? 'has-error' : '' }}">
        <label for="fechaNac" class="control-label">{{ 'FECHA DE NACIMIENTO' }}</label>
        <input class="form-control" name="fechaNac" type="decimal" id="fechaNac"
            value="{{ isset($personas->fechaNac) ? $personas->fechaNac : '' }}">
        {!! $errors->first('fechaNac', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('lugarReg') ? 'has-error' : '' }}">
        <label for="lugarReg" class="control-label">{{ 'LUGAR DE RECIDENCIA' }}</label>
        <input class="form-control" name="lugarReg" type="text" oninput="this.value = this.value.toUpperCase()"
            id="lugarReg" value="{{ isset($personas->lugarReg) ? $personas->lugarReg : '' }}">
        {!! $errors->first('lugarReg', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('estadoCiv') ? 'has-error' : '' }}">
        <label for="estadoCiv" class="control-label">{{ 'ESTADO CIVIL' }}</label>
        <input class="form-control" name="estadoCiv" type="text" oninput="this.value = this.value.toUpperCase()"
            id="estadoCiv" value="{{ isset($personas->estadoCiv) ? $personas->estadoCiv : '' }}">
        {!! $errors->first('estadoCiv', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('nacionalidad') ? 'has-error' : '' }}">
        <label for="nacionalidad" class="control-label">{{ 'NACIONALIDAD' }}</label>
        <input class="form-control" name="nacionalidad" type="text" oninput="this.value = this.value.toUpperCase()"
            id="nacionalidad" value="{{ isset($personas->nacionalidad) ? $personas->nacionalidad : '' }}">
        {!! $errors->first('nacionalidad', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group">
        <label for="matricula" class="control-label">{{ 'MATRÍCULA' }}</label>
        <input class="form-control" name="matricula" type="text" oninput="this.value = this.value.toUpperCase()"
            id="matricula">
        <span id="matricula-existe" style="color: red; display: none;">Esta matrícula ya existe.</span>
    </div>


    {{-- <div class="form-group {{ $errors->has('trn') ? 'has-error' : '' }}">
        <label for="trn" class="control-label">{{ '' }}</label>
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
        <input class="form-control" name="servicio" type="text" oninput="this.value = this.value.toUpperCase()"
            id="servicio" value="{{ isset($artefacto->servicio->servicio) ? $artefacto->servicio->servicio : '' }}">
        {!! $errors->first('servicio', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('asociacion') ? 'has-error' : '' }}">
        <label for="asociacion" class="control-label">{{ 'ASOCIACION' }}</label>
        <input class="form-control" name="asociacion" type="text" oninput="this.value = this.value.toUpperCase()"
            id="asociacion" value="{{ isset($artefacto->asociacion) ? $artefacto->asociacion : '' }}">
        {!! $errors->first('asociacion', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('observaciones') ? 'has-error' : '' }}">
        <label for="observaciones" class="control-label">{{ 'OBSERVACIONES' }}</label>
        <input class="form-control" name="observaciones" type="text"
            oninput="this.value = this.value.toUpperCase()" id="observaciones"
            value="{{ isset($artefacto->observaciones) ? $artefacto->observaciones : '' }}">
        {!! $errors->first('observaciones', '<p class="help-block">:message</p>') !!}
    </div>
 --}}

    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'ACTUALIZAR' : 'Añadir' }}">
    </div>
