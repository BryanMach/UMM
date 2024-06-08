<div class="form-group {{ $errors->has('idPersonal') ? 'has-error' : '' }}">
    <label for="idPersonal" class="control-label">{{ 'PERSONAL' }}</label>
    <select class="form-control" name="idPersonal" id="idPersonal">
        @foreach ($personas as $persona)
            @if ($formMode == 'edit')
                @if ($persona->id == $usuario->idPersonal)
                    <option value="{{ $persona->id }}" selected>{{ $persona->cargo }}:
                        {{ $persona->grado }}.
                        {{ $persona->nombres }}
                        {{ $persona->apellidos }}</option>
                @else
                    <option value="{{ $persona->id }}">{{ $persona->cargo }}:
                        {{ $persona->grado }}.
                        {{ $persona->nombres }}
                        {{ $persona->apellidos }}</option>
                @endif
            @else
                <option value="{{ $persona->id }}">{{ $persona->cargo }}:
                    {{ $persona->grado }}.
                    {{ $persona->nombres }}
                    {{ $persona->apellidos }}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('idPersonal', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('usuario') ? 'has-error' : '' }}">
    <label for="usuario" class="control-label">{{ 'USUARIO' }}</label>
    <input class="form-control" name="usuario" type="text" id="usuario"
        value="{{ isset($usuario->usuario) ? $usuario->usuario : '' }}">
    {!! $errors->first('usuario', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('contrasena') ? 'has-error' : '' }}">
    <label for="contrasena" class="control-label">{{ 'CONTRASEÑA' }}</label>
    <input class="form-control" name="contrasena" type="text" id="contrasena"
        value="{{ isset($usuario->contrasena) ? $usuario->contrasena : '' }}">
    {!! $errors->first('contrasena', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nivel') ? 'has-error' : '' }}">
    <label for="nivel" class="control-label">{{ 'NIVEL' }}</label>
    <select class="form-control" name="nivel" id="nivel">
        @if ($formMode == 'edit')
            @switch($usuario->nivel)
                @case(1)
                    <option value="1" selected>ADMINISTRADOR</option>
                    <option value="2">JEFE</option>
                    <option value="3">ARCHIVO INTERNO</option>
                    <option value="4">ARCHIVO EXTERNO</option>
                @break

                @case(2)
                    <option value="1">ADMINISTRADOR</option>
                    <option value="2" selected>JEFE</option>
                    <option value="3">ARCHIVO INTERNO</option>
                    <option value="4">ARCHIVO EXTERNO</option>
                @break

                @case(3)
                    <option value="1">ADMINISTRADOR</option>
                    <option value="2">JEFE</option>
                    <option value="3" selected>ARCHIVO INTERNO</option>
                    <option value="4">ARCHIVO EXTERNO</option>
                @break

                @case(4)
                    <option value="1">ADMINISTRADOR</option>
                    <option value="2">JEFE</option>
                    <option value="3">ARCHIVO INTERNO</option>
                    <option value="4" selected>ARCHIVO EXTERNO</option>
                @break

                @default
            @endswitch
        @else
            <option value="1">ADMINISTRADOR</option>
            <option value="2">JEFE</option>
            <option value="3">ARCHIVO INTERNO</option>
            <option value="4">ARCHIVO EXTERNO</option>
        @endif
    </select>
    {!! $errors->first('nivel', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Añadir' }}">
</div>
