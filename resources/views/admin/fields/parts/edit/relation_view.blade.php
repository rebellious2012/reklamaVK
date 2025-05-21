<div class="form-group">
    <label for="parent_id">{{ $title ?? 'Relation Field' }}</label>
    <select id="parent_id" name="parent_id" class="form-control">
        <option value="">Нет</option>
        @foreach($fields as $parentField)
            <option value="{{ $parentField->id }}" {{ $field->parent_id == $parentField->id?'selected=selected' : '' }}>{{ $parentField->label }}</option>
        @endforeach
    </select>
</div>
