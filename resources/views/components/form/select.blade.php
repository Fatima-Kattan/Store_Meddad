@props([
    'label' =>'',
    'name' => '',
    'options' => [],
    'selected',
])

<label for="{{ $name }}">{{ $label }}</label>
<select name="{{ $name }}" id="{{ $name }}" class="form-control
    @error($name) is-invalid @enderror">
    <option value="">select an option</option>
    @foreach ($options as $key => $value)
        <option value="{{ $key }}"
        @if ($key == old($name, $selected))
            selected
        @endif>
            {{ $value }}
        </option>
    @endforeach
</select>
@error($name)
    <p class="text-danger">{{ $message }}</p>
@enderror