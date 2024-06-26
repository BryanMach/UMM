<div class="form-group {{ $errors->has('ci') ? 'has-error' : '' }}">
    <label for="ci" class="control-label">{{ 'CI' }}</label>
    <input class="form-control" name="ci" type="text" oninput="this.value = this.value.toUpperCase()"  id="ci"
        value="{{ isset($personal->ci) ? $personal->ci : '' }}">
    {!! $errors->first('ci', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idCargo') ? 'has-error' : '' }}">
    <label for="idCargo" class="control-label">{{ 'CARGO' }}</label>
    <select class="form-control" name="idCargo" id="idCargo">
        @foreach ($cargos as $cargo)
            @if ($formMode == 'edit')
                @if ($cargo->id == $personal->idCargo)
                    <option value="{{ $cargo->id }}" selected>{{ $cargo->cargo }}:
                    </option>
                @else
                    <option value="{{ $cargo->id }}">{{ $cargo->cargo }}:
                    </option>
                @endif
            @else
                <option value="{{ $cargo->id }}">{{ $cargo->cargo }}:
                </option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('idCargo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('grado') ? 'has-error' : '' }}">
    <label for="grado" class="control-label">{{ 'GRADO' }}</label>
    <input class="form-control" name="grado" type="text" oninput="this.value = this.value.toUpperCase()"  id="grado"
        value="{{ isset($personal->grado) ? $personal->grado : '' }}">
    {!! $errors->first('grado', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombres') ? 'has-error' : '' }}">
    <label for="nombres" class="control-label">{{ 'NOMBRES' }}</label>
    <input class="form-control" name="nombres" type="text" oninput="this.value = this.value.toUpperCase()"  id="nombres"
        value="{{ isset($personal->nombres) ? $personal->nombres : '' }}">
    {!! $errors->first('nombres', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('apellidos') ? 'has-error' : '' }}">
    <label for="apellidos" class="control-label">{{ 'APELLIDOS' }}</label>
    <input class="form-control" name="apellidos" type="text" oninput="this.value = this.value.toUpperCase()"  id="apellidos"
        value="{{ isset($personal->apellidos) ? $personal->apellidos : '' }}">
    {!! $errors->first('apellidos', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('contacto') ? 'has-error' : '' }}">
    <label for="contacto" class="control-label">{{ 'CONTACTO' }}</label>
    <input class="form-control" name="contacto" type="text" oninput="this.value = this.value.toUpperCase()"  id="contacto"
        value="{{ isset($personal->contacto) ? $personal->contacto : '' }}">
    {!! $errors->first('contacto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
    <label for="foto" class="control-label">{{ 'FOTO' }}</label>
    <input class="form-control" name="foto" type="file" id="foto"
        value="{{ isset($personal->foto) ? $personal->foto : '' }}">
    {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
    <label for="descripcion" class="control-label">{{ 'DESCRIPCION' }}</label>
    <input class="form-control" name="descripcion" type="text" oninput="this.value = this.value.toUpperCase()"  id="descripcion"
        value="{{ isset($personal->descripcion) ? $personal->descripcion : '' }}">
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('vigencia') ? 'has-error' : '' }}">
    <label for="vigencia" class="control-label">{{ 'VIGENCIA' }}</label>
    <div class="radio">
        <label><input name="vigencia" type="radio" value="1"
                {{ isset($personal) && 1 == $personal->vigencia ? 'checked' : '' }}> Yes</label>
    </div>
    <div class="radio">
        <label><input name="vigencia" type="radio" value="0"
                @if (isset($personal)) {{ 0 == $personal->vigencia ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            No</label>
    </div>
    {!! $errors->first('vigencia', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'ACTUALIZAR' : 'Añadir' }}">
</div>
