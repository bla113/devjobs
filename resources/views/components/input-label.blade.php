@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-sm text-gray-500 font-bold uppercase mb-5']) }}>
    {{ $value ?? $slot }}
</label>
