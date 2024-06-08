<html>
<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group {{ $errors->has('idCuenca') ? 'has-error' : '' }}">
        <label for="idCuenca" class="control-label">{{ 'SELECCIONE LA CUENCA EN QUE TRABAJARA:' }}</label>
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

    <div class="flex items-center justify-end mt-4">
        <a href="registro"><button class="block mt-1 w-full" action="GET"> Registrar</button></a>
    </div>
</form>

</html>
