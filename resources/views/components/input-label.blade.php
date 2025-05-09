@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-black text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
