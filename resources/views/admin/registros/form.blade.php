<script>
    function handleDecimalInput() {
    let inputField = document.getElementById('campo');
    let value = inputField.value;

    // Convert commas to dots
    value = value.replace(/,/g, '.');

    // Convert whole numbers to decimal format
    if (!isNaN(value) && Number.isInteger(parseFloat(value))) {
        inputField.value = parseFloat(value).toFixed(1);
    }

    // Allow only decimal numbers with dot as separator
    if (!/^\\d*\\.?\\d*$/.test(value)) {
        inputField.value = value.slice(0, -1);
    }
}



function toggleTextInputs() {
    let choice = document.querySelector('input[name="choice"]:checked').value;
    let textInput1 = document.getElementById('propulsion');
    let textInput2 = document.getElementById('tipoM');
    let textInput3 = document.getElementById('marca');
    let textInput4 = document.getElementById('numero');
    let textInput5 = document.getElementById('potencia');
    let textInput6 = document.getElementById('nominalelectrica');
    if (choice === "OTRO") {
        textInput1.disabled = false;
        textInput2.disabled = true;
        textInput3.disabled = true;
        textInput4.disabled = true;
        textInput5.disabled = true;
        textInput6.disabled = true;
    } else {
        textInput1.disabled = true;
        textInput2.disabled = false;
        textInput3.disabled = false;
        textInput4.disabled = false;
        textInput5.disabled = false;
        textInput6.disabled = false;
    }
}

</script>
<h2>Datos del Propietario</h2>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
    <label for="nombre" class="control-label">{{ 'NOMBRE' }}</label>
    <input class="form-control" name="nombre" type="text" oninput="this.value = this.value.toUpperCase()"  id="nombre"
        value="{{ isset($propietario->nombre) ? $propietario->nombre : '' }}">
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tipo') ? 'has-error' : '' }}">
    <label for="tipo" class="control-label">{{ 'Tipo' }}</label>
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
    <label for="FechaIni" class="control-label">{{ 'Fecha de Nacimiento/ Fecha de Constitución' }}</label>
    <input class="form-control" name="FechaIni" type="date" id="FechaIni"
        value="{{ isset($propietario->FechaIni) ? $propietario->FechaIni : '' }}">
    {!! $errors->first('FechaIni', '<p class="help-block">:message</p>') !!}
</div>
<h2>Datos del artefacto</h2>
<div class="form-group {{ $errors->has('idBaseOperativa') ? 'has-error' : '' }}">
    <label for="idBaseOperativa" class="control-label">{{ 'Bases operativas' }}</label>
    <select class="form-control" name="idBaseOperativa" id="idBaseOperativa">
        @foreach ($basesoperativas as $base)
            @if ($formMode == 'edit')
                @if ($base->id == $artefacto->idBaseOperativa)
                    <option value="{{ $base->id }}" selected>
                        {{ $base->cuenca->cuenca }}:{{ $base->baseOperativa }}</option>
                @else
                    <option value="{{ $base->id }}">{{ $base->cuenca->cuenca }}:{{ $base->baseOperativa }}
                    </option>
                @endif
            @else
                <option value="{{ $base->id }}">{{ $base->cuenca->cuenca }}:{{ $base->baseOperativa }}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('idBaseOperativa', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idBaseOperativa') ? 'has-error' : '' }}">
    <div class="form-group {{ $errors->has('matricula') ? 'has-error' : '' }}">
        <label for="matricula" class="control-label">{{ 'Matricula' }}</label>
        <input class="form-control" name="matricula" type="text" oninput="this.value = this.value.toUpperCase()"  id="matricula"
            value="{{ isset($artefacto->matricula) ? $artefacto->matricula : '' }}">
        {!! $errors->first('matricula', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('nombreA') ? 'has-error' : '' }}">
        <label for="nombreA" class="control-label">{{ 'Nombre del artefacto' }}</label>
        <input class="form-control" name="nombreA" type="text" oninput="this.value = this.value.toUpperCase()"  id="nombreA"
            value="{{ isset($artefacto->nombre) ? $artefacto->nombre : '' }}">
        {!! $errors->first('nombreA', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('idTipo') ? 'has-error' : '' }}">
        <label for="idTipo" class="control-label">{{ 'Tipo' }}</label>
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
        <label for="idMaterial" class="control-label">{{ 'Material' }}</label>
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
<table>
    <h4>MEDIDAS DE LA EMBARCACIÓN</h4>
    <tr><td>
        <div class="form-group {{ $errors->has('eslora') ? 'has-error' : '' }}">
            <label for="eslora" >{{ 'Eslora' }}</label>
            <input name="eslora" class="form-control" type="text" id="eslora" oninput="handleDecimalInput()"
             required
                value="{{ isset($artefacto->eslora) ? $artefacto->eslora : '' }}">
            {!! $errors->first('eslora', '<p class="help-block">:message</p>') !!}
        </div>
        </td><td>
            <div class="form-group {{ $errors->has('manga') ? 'has-error' : '' }}">
                <label for="manga" >{{ 'Manga' }}</label>
                <input name="manga" class="form-control" type="text" id="manga" oninput="handleDecimalInput()"
                inputmode="number" required
                    value="{{ isset($artefacto->manga) ? $artefacto->manga : '' }}">
                {!! $errors->first('manga', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        <td>
            <div class="form-group {{ $errors->has('trn') ? 'has-error' : '' }}">
                <label for="trn" class="control-label">{{ 'TRN' }}</label>
                <input class="form-control" name="trn" type="text" id="trn" oninput="handleDecimalInput()"
                inputmode="number" required
                    value="{{ isset($artefacto->trn) ? $artefacto->trn : '' }}">
                {!! $errors->first('trn', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
    <tr><td>
        <div class="form-group {{ $errors->has('puntal') ? 'has-error' : '' }}">
            <label for="puntal" >{{ 'Puntal' }}</label>
            <input name="puntal" class="form-control" type="text" id="puntal" oninput="handleDecimalInput()"
            inputmode="number" required
                value="{{ isset($artefacto->puntal) ? $artefacto->puntal : '' }}">
            {!! $errors->first('puntal', '<p class="help-block">:message</p>') !!}
        </div>
        </td><td>
            <div class="form-group {{ $errors->has('francobordo') ? 'has-error' : '' }}">
                <label for="francobordo">{{ 'Francobordo' }}</label>
                <input name="francobordo" class="form-control" type="text" id="francobordo" oninput="handleDecimalInput()"
                inputmode="number" required
                    value="{{ isset($artefacto->francobordo) ? $artefacto->francobordo : '' }}">
                {!! $errors->first('francobordo', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
        
        <td>
            <div class="form-group {{ $errors->has('trb') ? 'has-error' : '' }}">
                <label for="trb" class="control-label">{{ 'TRB' }}</label>
                <input class="form-control" name="trb" type="text" id="trb" oninput="handleDecimalInput()"
                inputmode="number" required
                    value="{{ isset($artefacto->trb) ? $artefacto->trb : '' }}">
                {!! $errors->first('trb', '<p class="help-block">:message</p>') !!}
            </div>
        </td>
    </tr>
</table>






                {{-- <input type="radio" name="choice" value="MOTOR" onclick="toggleTextInputs()"> MOTOR
                <input type="radio" name="choice" value="OTRO" onclick="toggleTextInputs()"> OTRO --}}

<div class="form-group {{ $errors->has('construccion') ? 'has-error' : '' }}">
    <label for="construccion" class="control-label">{{ 'AÑO DE CONSTRUCCIÓN' }}</label>
    <input class="form-control" name="construccion" type="text" oninput="this.value = this.value.toUpperCase()"  id="construccion"
        value="{{ isset($artefacto->construccion) ? $artefacto->construccion : '' }}">
    {!! $errors->first('construccion', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('idServicio') ? 'has-error' : '' }}">
    <label for="idServicio" class="control-label">{{ 'SERVICIO' }}</label>
    <select class="form-control" name="idServicio" id="idServicio">
        @foreach ($servicios as $servicio)
            @if ($formMode == 'edit')
                @if ($servicio->id == $artefacto->idServicio)
                    <option value="{{ $servicio->id }}" selected>{{ $servicio->servicio }}</option>
                @else
                    <option value="{{ $servicio->id }}">{{ $servicio->servicio }}</option>
                @endif
            @else
                <option value="{{ $servicio->id }}">{{ $servicio->servicio }}</option>
            @endif
        @endforeach
    </select>
    {!! $errors->first('idServicio', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('asociacion') ? 'has-error' : '' }}">
    <label for="asociacion" class="control-label">{{ 'ASOCIACIÓN/COOPERATIVA' }}</label>
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
<div class="form-group {{ $errors->has('lugar') ? 'has-error' : '' }}">
    <label for="lugar" class="control-label">{{ 'LUGAR DE LA INSPECCIÓN' }}</label>
    <input class="form-control" name="lugar" type="text" onclick="toggleTextInputs()"
    oninput="this.value = this.value.toUpperCase()"  id="lugar"
        value="{{ isset($datosadicionale->lugar) ? $datosadicionale->lugar : '' }}">
    {!! $errors->first('lugar', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mercPelig') ? 'has-error' : '' }}">
    <label for="mercPelig" class="control-label">{{ '¿Trasporta mercancias peligrosas?' }}</label>
    <div class="radio">
        <label><input name="mercPelig" type="radio" value="Si"
                {{ isset($propietario) && 'Si' == $propietario->mercPelig ? 'checked' : '' }}> Si</label>
    </div>
    <div class="radio">
        <label><input name="mercPelig" type="radio" value="No"
                @if (isset($propietario)) {{ 'No' == $propietario->mercPelig ? 'checked' : '' }} @else {{ 'checked' }} @endif>
            No</label>
    </div>
    {!! $errors->first('mercPelig', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('maxPasajeros') ? 'has-error' : '' }}">
    <label for="maxPasajeros" class="control-label">{{ 'Número máximo de pasajeros' }}</label>
    <input class="form-control" name="maxPasajeros" type="number" id="maxPasajeros"
        value="{{ isset($datosadicionale->maxPasajeros) ? $datosadicionale->maxPasajeros : '' }}">
    {!! $errors->first('maxPasajeros', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('propulsion') ? 'has-error' : '' }}">
    <label for="propulsion" class="control-label">{{ 'TIPO DE PROPULSIÓN:' }}</label>
    
    <input name="choice" type="radio" value="MOTOR"
                {{ isset($artefacto) && 'MOTOR' == $artefacto->propulsion ? 'checked' : '' }}
                onclick="toggleTextInputs()"> MOTOR/MÁQUINA AUXILIAR</label>
    
    
    <input name="choice" type="radio" value="OTRO"
                {{ isset($artefacto) && 'MOTOR' != $artefacto->propulsion ? 'checked' : '' }}
                onclick="toggleTextInputs()"> OTRO</label>
    
    <input class="form-control" name="propulsion" type="text" onclick="toggleTextInputs()"
    oninput="this.value = this.value.toUpperCase()"  id="propulsion"
        value="{{ isset($artefacto->propulsion) ? $artefacto->propulsion : '' }}" disabled>
    {!! $errors->first('propulsion', '<p class="help-block">:message</p>') !!}
</div>
<h2>Detalles del motor</h2>
<div class="form-group {{ $errors->has('tipoM') ? 'has-error' : '' }}">
    <label for="tipoM" class="control-label">{{ 'Tipo de motor' }}</label>
    <input class="form-control" name="tipoM" type="text" oninput="this.value = this.value.toUpperCase()"  id="tipoM"
        value="{{ isset($motore->tipo) ? $motore->tipo : '' }}" disabled>
    {!! $errors->first('tipoM', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('marca') ? 'has-error' : '' }}">
    <label for="marca" class="control-label">{{ 'Marca del motor' }}</label>
    <input class="form-control" name="marca" type="text" oninput="this.value = this.value.toUpperCase()"  id="marca"
        value="{{ isset($motore->marca) ? $motore->marca : '' }}" disabled>
    {!! $errors->first('marca', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('numero') ? 'has-error' : '' }}">
    <label for="numero" class="control-label">{{ 'Numero del motor' }}</label>
    <input class="form-control" name="numero" type="text" oninput="this.value = this.value.toUpperCase()"  id="numero"
        value="{{ isset($motore->numero) ? $motore->numero : '' }}" disabled>
    {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('potencia') ? 'has-error' : '' }}">
    <label for="potencia" class="control-label">{{ 'Potencia HP' }}</label>
    <input class="form-control" name="potencia" type="text" oninput="this.value = this.value.toUpperCase()"  id="potencia"
        value="{{ isset($motore->potencia) ? $motore->potencia : '' }}" disabled>
    {!! $errors->first('potencia', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nominalelectrica') ? 'has-error' : '' }}">
    <label for="nominalelectrica" class="control-label">{{ 'Potencia nominal electrica W' }}</label>
    <input class="form-control" name="nominalelectrica" type="text" oninput="this.value = this.value.toUpperCase()"  id="nominalelectrica"
        value="{{ isset($motore->nominalelectrica) ? $motore->nominalelectrica : '' }}" disabled>
    {!! $errors->first('nominalelectrica', '<p class="help-block">:message</p>') !!}
</div>
    
    {{-- <div class="form-group {{ $errors->has('cargaComb') ? 'has-error' : '' }}">
        <label for="cargaComb" class="control-label">{{ 'Propulsión y sistema de de combustible' }}</label>
        <select class="form-control" name="cargaComb" type="number" id="cargaComb">
            @if ($formMode == 'edit')
                @switch ($datosadicionale->cargaComb)
                    @case (11)
                        <option value="11" selected>Embarcación autopropulsada: Abierto</option>
                        <option value="12">Embarcación autopropulsada: Cerrado</option>
                        <option value="13">Embarcación autopropulsada: Tanque</option>
                        <option value="21">Embarcación sin propulsión: Abierto</option>
                        <option value="22">Embarcación sin propulsión: Cerrado</option>
                        <option value="23">Embarcación sin propulsión: Tanque</option>
                    @break;
                    @case (12)
                        <option value="11">Embarcación autopropulsada: Abierto</option>
                        <option value="12" selected>Embarcación autopropulsada: Cerrado</option>
                        <option value="13">Embarcación autopropulsada: Tanque</option>
                        <option value="21">Embarcación sin propulsión: Abierto</option>
                        <option value="22">Embarcación sin propulsión: Cerrado</option>
                        <option value="23">Embarcación sin propulsión: Tanque</option>
                    @break;
                    @case (13)
                        <option value="11">Embarcación autopropulsada: Abierto</option>
                        <option value="12">Embarcación autopropulsada: Cerrado</option>
                        <option value="13" selected>Embarcación autopropulsada: Tanque</option>
                        <option value="21">Embarcación sin propulsión: Abierto</option>
                        <option value="22">Embarcación sin propulsión: Cerrado</option>
                        <option value="23">Embarcación sin propulsión: Tanque</option>
                    @break;
                    @case (21)
                        <option value="11">Embarcación autopropulsada: Abierto</option>
                        <option value="12">Embarcación autopropulsada: Cerrado</option>
                        <option value="13">Embarcación autopropulsada: Tanque</option>
                        <option value="21" selected>Embarcación sin propulsión: Abierto</option>
                        <option value="22">Embarcación sin propulsión: Cerrado</option>
                        <option value="23">Embarcación sin propulsión: Tanque</option>
                    @break;
                    @case (22)
                        <option value="11">Embarcación autopropulsada: Abierto</option>
                        <option value="12">Embarcación autopropulsada: Cerrado</option>
                        <option value="13">Embarcación autopropulsada: Tanque</option>
                        <option value="21">Embarcación sin propulsión: Abierto</option>
                        <option value="22" selected>Embarcación sin propulsión: Cerrado</option>
                        <option value="23">Embarcación sin propulsión: Tanque</option>
                    @break;
                    @case (23)
                        <option value="11">Embarcación autopropulsada: Abierto</option>
                        <option value="12">Embarcación autopropulsada: Cerrado</option>
                        <option value="13">Embarcación autopropulsada: Tanque</option>
                        <option value="21">Embarcación sin propulsión: Abierto</option>
                        <option value="22">Embarcación sin propulsión: Cerrado</option>
                        <option value="23" selected>Embarcación sin propulsión: Tanque</option>
                    @break;
                @endswitch;
            @else
                <option value="11">Embarcación autopropulsada: Abierto</option>
                <option value="12">Embarcación autopropulsada: Cerrado</option>
                <option value="13">Embarcación autopropulsada: Tanque</option>
                <option value="21">Embarcación sin propulsión: Abierto</option>
                <option value="22">Embarcación sin propulsión: Cerrado</option>
                <option value="23">Embarcación sin propulsión: Tanque</option>
            @endif
        </select>
        {!! $errors->first('cargaComb', '<p class="help-block">:message</p>') !!}
    </div> 
    <div class="form-group {{ $errors->has('peso') ? 'has-error' : '' }}">
        <label for="peso" class="control-label">{{ 'Peso' }}</label>
        <input class="form-control" name="peso" type="number" id="peso"
            value="{{ isset($datosadicionale->peso) ? $datosadicionale->peso : '' }}">
        {!! $errors->first('peso', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('altura') ? 'has-error' : '' }}">
        <label for="altura" class="control-label">{{ 'Altura' }}</label>
        <input class="form-control" name="altura" type="number" id="altura"
            value="{{ isset($datosadicionale->altura) ? $datosadicionale->altura : '' }}">
        {!! $errors->first('altura', '<p class="help-block">:message</p>') !!}
    </div>--}}
    <h2>Inspecciones</h2>
    <div class="form-group {{ $errors->has('gestion') ? 'has-error' : '' }}">
        <label for="gestion" class="control-label">{{ 'Gestion' }}</label>
        <input class="form-control" name="gestion" type="text" oninput="this.value = this.value.toUpperCase()"  id="gestion"
            value="{{ isset($inspeccione->gestion) ? $inspeccione->gestion : '' }}">
        {!! $errors->first('gestion', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('jefeinspector') ? 'has-error' : '' }}">
        <label for="jefeinspector" class="control-label">{{ 'TECNICO DE INSPECCION' }}</label>
        <input class="form-control" name="jefeinspector" type="text" oninput="this.value = this.value.toUpperCase()"  id="jefeinspector"
            value="{{ isset($inspeccione->jefeinspector) ? $inspeccione->jefeinspector : '' }}">
        {!! $errors->first('jefeinspector', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('motivo') ? 'has-error' : '' }}">
        <label for="motivo" class="control-label">{{ 'MOTIVO DE INSPECCION' }}</label>
        <select class="form-control" name="motivo" id="motivo">
                @if ($formMode == 'edit')
                    @if ($inspeccione->motivo == 'INSPECCIÓN ORDINARIA')
                        <option value="INSPECCIÓN ORDINARIA" selected>INSPECCIÓN ORDINARIA</option>
                        <option value="INSPECCIÓN EXTRAORDINARIA">INSPECCIÓN EXTRAORDINARIA</option>
                    @else
                    <option value="INSPECCIÓN ORDINARIA" >INSPECCIÓN ORDINARIA</option>
                    <option value="INSPECCIÓN EXTRAORDINARIA" selected>INSPECCIÓN EXTRAORDINARIA</option>
                    @endif
                @else
                    <option value="INSPECCIÓN ORDINARIA" >INSPECCIÓN ORDINARIA</option>
                    <option value="INSPECCIÓN EXTRAORDINARIA" >INSPECCIÓN EXTRAORDINARIA</option>
                @endif
        </select>
        {!! $errors->first('motivo', '<p class="help-block">:message</p>') !!}
    </div>
    <h2>Documentación</h2>
    <div class="form-group {{ $errors->has('directorio') ? 'has-error' : '' }}">
        <label for="directorio" class="control-label">{{ 'Documentos escaneados de este registro (PDF)' }}</label>
        <input class="form-control" name="directorio" type="file" id="directorio"
            value="{{ isset($documentacione->directorio) ? $documentacione->directorio : '' }}">
        {!! $errors->first('directorio', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'ACTUALIZAR' : 'Añadir' }}">
    </div>
