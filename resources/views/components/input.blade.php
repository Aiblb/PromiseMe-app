@props(['type', 'label', 'name', 'required' => false, 'retrieveOld' => true])

<div class="input-group has-validation mt-4">

    <div class="form-floating {{ $errors->has($name) ? 'is-invalid' : 'mb-2' }}">

        <input type="{{ $type }}"
            class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }} w-100"
            id="floatingInput{{ strtolower(str_replace(' ', '', $label)) }}"
            name="{{ $name }}"
            placeholder="placeholder"
            oninput="QuitInvalid(this)"
            autocomplete="off" {!! $required == true ? 'required' : '' !!}
            {{ $attributes(['value' => $retrieveOld ? old($name) : request($name)]) }}>
        <label for="floatingInput{{ strtolower(str_replace(' ', '', $label)) }}" class="">{{ $label }}</label>

    </div>

@props(['type', 'label', 'name', 'placeholder' => '', 'required' => false, 'retrieveOld' => true])
<div class="input-group has-validation mt-4">
    <div class="{{ $errors->has($name) ? 'is-invalid' : 'mb-3' }} w-100 ">
        <label for="floatingInput{{ strtolower(str_replace(' ', '', $label)) }}" class="mb-2">{{ $label }}</label>
        <input type="{{ $type }}" class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }} w-100"
            id="floatingInput{{ strtolower(str_replace(' ', '', $label)) }}" name="{{ $name }}"
            :placeholder="$placeholder" oninput="QuitInvalid(this)" autocomplete="off" {!! $required == true ? 'required' : '' !!}
            {{ $attributes(['value' => $retrieveOld ? old($name) : request($name)]) }}>
    </div>
    @error($name)
        <div class="invalid-feedback mb-3">
            {{ $message }}
        </div>
    @enderror
</div>
