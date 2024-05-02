<div class="form-group {{ $errors->has('material') ? 'has-error' : ''}}">
    <label for="material" class="control-label">{{ 'Material' }}</label>
    <input class="form-control" name="material" type="text" id="material" value="{{ isset($material->material) ? $material->material : ''}}" >
    {!! $errors->first('material', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Añadir' }}">
</div>
