@props([
'id',
'label',
'name',
'type' => 'text',
'value' => '',
'placeholder' => '',
])

<label for="{{ $id }}">{{ $label }}</label>
<input type="{{ $type }}" 
class="form-control
@error($name) 
is-invalid
@enderror"
name="{{ $name }}" value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}">
@error($name)
    <div class="text-danger">{{ $message }}</div>
@enderror